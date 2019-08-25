<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = $request->input('search');

        if (empty($_GET['page'])){
            $pageNum = 1;
        }else {
            $pageNum = $_GET['page'];
        }

        if(!$query) {

            return redirect()->route('home');

        }

        $userData = User::select('id', 'name','avatar')->where('name', 'LIKE', "%{$query}%")->get();

        $projectData = Project::select('id', 'name','image')->where('name', 'LIKE', "%{$query}%")
            ->orWhere('search_key', 'LIKE', "%{$query}%")->get();

        $total = $userData->count() + $projectData->count();

        foreach ($projectData as $project){
            $userData->add($project);
        }

//        $collection = $userData->merge($projectData);

        $results = $userData->paginate(5);

        $results->appends ( array (
            'q' => $request->input('search')
        ) );

        return view('search.index')
            ->with('results', $results)
            ->with('total', $total)
            ->with('query', $query);
    }

//    public function paginate($items, $perPage = 5, $page = null, $options = [])
//    {
//        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }

    public function getIndex(Request $request){
        $query = $request->input('q');

        if(!$query) {

            return redirect()->route('home');

        }

        $userData = User::select('id', 'name','avatar')->where('name', 'LIKE', "%{$query}%")->get();

        $projectData = Project::select('id', 'name','image')->where('name', 'LIKE', "%{$query}%")
            ->orWhere('search_key', 'LIKE', "%{$query}%")->get();

        $total = $userData->count() + $projectData->count();

        foreach ($projectData as $project){
            $userData->add($project);
        }

        $results = $userData->paginate(5);

        $results->appends ( array (
            'q' => $request->input('q')
        ) );

        return view('search.index')
            ->with('results', $results)
            ->with('total', $total)
            ->with('query', $query);
    }

    public function topFetch(Request $request){

        if ($request->get('query')){
            $query = $request->get('query');

            $userData = User::select('id', 'name','avatar')->where('name', 'LIKE', "%{$query}%")->limit(50)->orderby('created_at','DESC')->get();

            $projectData = Project::select('id', 'name','image')->where('name', 'LIKE', "%{$query}%")
                ->orWhere('search_key', 'LIKE', "%{$query}%")->limit(50)->orderby('created_at','DESC')->get();

            foreach ($projectData as $project){
                $userData->add($project);
            }

//            $results = $userData->limit(50)->orderby('created_at','DESC')->get();

            $output = '<ul class="dropdown-menu" style="display: block;position: relative;width: 100%;max-height: 300px;overflow: auto;">';

            foreach ($userData as $row){
                if (empty($row->avatar)){
                    $output .= '<li class="top_search_row"><a href="'.url('search/result/project').'/'.$query.'/'.$row->id.'" style="color: #333333">' . $row->name . '</a></li>';
                }else {
                    $output .= '<li class="top_search_row"><a href="'.url('profile/member').'/'.$row->id.'" style="color: #333333">' . $row->name . '</a></li>';
                }
            }

            $output .= '</ul>';

            echo $output;
        }
    }

    public function searchProject($q, $id){
        $members = Member::where('project_id', $id)->orderby('id')->limit(3)->get();
        $totalMember = Member::where('project_id', $id)->get()->count();
        $project = Project::find($id);

        $i = 0;
        foreach ($members as $member){
            ++$i;
            if($i == 1){
                $member1 = $member;
            }
            if($i == 2){
                $member2 = $member;
            }
            if($i == 3){
                $member3 = $member;
            }
        }

        if (empty($member1)){
            return view('search.project')
                ->with('project', $project)
                ->with('totalMember', $totalMember)
                ->with('query', $q);
        }
        if (empty($member2)){
            return view('search.project')
                ->with('project', $project)
                ->with('totalMember', $totalMember)
                ->with('member1', $member1)
                ->with('query', $q);
        }
        if (empty($member3)){
            return view('search.project')
                ->with('project', $project)
                ->with('totalMember', $totalMember)
                ->with('member1', $member1)
                ->with('member2', $member2)
                ->with('query', $q);
        }
        if ($members->count() == 3){
            return view('search.project')
                ->with('project', $project)
                ->with('totalMember', $totalMember)
                ->with('member1', $member1)
                ->with('member2', $member2)
                ->with('member3', $member3)
                ->with('query', $q);
        }
    }
}
