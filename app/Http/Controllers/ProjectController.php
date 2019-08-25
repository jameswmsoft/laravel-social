<?php

namespace App\Http\Controllers;

use App\Field;
use App\Follow;
use App\Member;
use App\Notification;
use App\Project;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('project.index');
    }

    public function ajax_index(){
        $uid = Auth::user()->id;
        $projects = Project::where('user_id', $uid)->get();

        $i = 0;
        foreach ($projects as $project){
            $project->index = ++$i;
        }

        return Datatables::of($projects)->make(true);
    }

    public function addView()
    {
        $members = User::all();
        $fields = Field::all();
        return view('project.add', ['members'=>$members, 'fields'=>$fields]);
    }

    public function addDO(Request $request){
        $pname = $request->input('name');
        $pdescription = $request->input('description');

        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
            'description' => 'required',
            'fields' => 'required',
            'members' => 'required',
            'keys' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/project/');
            $image->move($destinationPath, $name);

        }else{
            $name = 'default.png';
        }

        $fields = ''; $fd = 0;
        $numfields = count($request->input('fields'));

        foreach($request->input('fields') as $field)
        {
            if (++$fd === $numfields){
                $fields .= $field;
            }else {
                $fields .= $field . ",";
            }
        }

        $members = ''; $mb = 0;
        $nummembers = count($request->input('members'));

        foreach($request->input('members') as $member)
        {
            if (++$mb === $nummembers){
                $members .= $member;
            }else {
                $members .= $member . ",";
            }
        }

        $keys = ''; $ky = 0;
        $numkeys = count($request->input('keys'));

        foreach($request->input('keys') as $key)
        {
            if (++$ky === $numkeys){
                $keys .= $key;
            }else {
                $keys .= $key . ",";
            }
        }

        $acceptance = $request->input('optradio');

        $userid = Auth::user()->id;

        $project = Project::create(['name' => $pname, 'description'=>$pdescription, 'image' => $name, 'field' => $fields, 'member' => $members, 'search_key' => $keys, 'acceptance'=>$acceptance,'user_id' => $userid]);

        foreach($request->input('members') as $member)
        {
            Member::create(['project_id' =>$project->id, 'user_id' => $member, 'status'=>'1']);
        }

        return redirect()
            -> route('project.index')
            -> with('info', 'Your Project has been posted');
    }

    public function follow($pid){
        $project = Project::find($pid);

        if(!$project) {

            return redirect()->route('detail.index', ['pid'=>$pid])->with('info', 'There is no project to follow');
        }

        if(Auth::user()->hasFollowedProject($project)){
            return redirect()->back();
        }

        if($project['acceptance']){
            $accepted = '1';
        }else {
            $accepted = '0';
        }

        $data = $project->follows()->create(['user_id'=>Auth::user()->id, 'accepted'=>$accepted, 'status'=>'0']);

        if(!$project['acceptance']) {
            Notification::create([
                'from_id' => Auth::user()->id,
                'to_id' => $project->user_id,
                'table_type' => 'Follow',
                'table_id' => $data->id,
                'project_id' => $data->followable_id,
                'status' => '0',
                'to_del' => '0'
            ]);
        }

        return redirect()->back();

    }
}
