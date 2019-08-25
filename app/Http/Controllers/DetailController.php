<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Follow;
use App\Member;
use App\Notification;
use App\Project;
use App\Remark;
use App\User;
use Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($pid){
        $uid = Auth::user()->id;

        $project = Project::findOrFail($pid);
        $remarks = Remark::where('project_id', $pid)->get();
        $comments = Comment::where('project_id', $pid)->orderby('parent_id', 'asc')->get();
        $followers = Follow::where('followable_id', $pid)->where('accepted', '1')->get();
        $members = Member::where('project_id', $pid)->get();
        $users = User::all();

        return view('detail.index', ['project' => $project, 'members' => $members, 'remarks'=>$remarks, 'comments'=>$comments, 'followers'=>$followers, 'users'=>$users]);
    }

    public function comment(Request $request, $pid){
        $this->validate($request, [
            'inputFile' => 'mimetypes:image/gif,image/png,image/jpeg,image/jpg,image/bmp,image/webp,video/mp4|max:20000',
            'comment' => 'required'
        ]);

        if ($request->hasFile('inputFile')) {
            $image = $request->file('inputFile');
            $ext = $image->getClientOriginalExtension();
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/comment/');
            $image->move($destinationPath, $name);
        }else{
            $name = 'default';
            $ext = 'no';
        }

        Auth::user()->comments()->create([
            'project_id' => $pid,
            'comment' => $request->input('comment'),
            'file' => $name,
            'ext' => $ext,
        ]);

        return redirect()
            ->back()
            ->with('info', 'Comment posted');
    }

    public function recommend(Request $request, $rid){

        if($request->has('user')){
            $recommend_user = $request->input('user');
            $recommend_user = User::where('name',$recommend_user)->first()->id;
        }else {
            $recommend_user = 0;
        }
        $data = Auth::user()->recommends()->create([
            'remark_id' => $rid,
            'body' => $request->input('recommend'),
            'recommend_user_id' => $recommend_user
        ]);

        if($request->has('user')){
            $recommend_user = $request->input('user');
            Notification::create([
                'from_id' => Auth::user()->id,
                'to_id' => User::where('name',$recommend_user)->first()->id,
                'table_type' => 'Recommend',
                'table_id' => $data->id,
                'project_id' => $data->remark->project_id,
                'status'=>'0',
                'to_del'=>'0'
            ]);
        }

        return redirect()
            ->back()
            ->with('info', 'You replied the recommend successfully');
    }
}
