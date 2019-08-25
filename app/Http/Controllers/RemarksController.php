<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Member;
use App\Project;
use App\Remark;
use App\Remark_ct;
use App\User;
use Auth;
use Illuminate\Http\Request;

class RemarksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addIndex($rid, $pid)
    {
        $members = Member::where('project_id', $pid)->get();
        $project = Project::findOrFail($pid);
        $remark_title = Remark_ct::findOrFail($rid);
        $followers = Follow::where('followable_id', $pid)->where('accepted', '1')->get();

        return view('remark.index', ['project' => $project, 'members' => $members, 'followers'=>$followers, 'remark_title'=>$remark_title]);
    }

    public function postAddIndex(Request $request, $rid, $pid){
        $uid = Auth::user()->id;
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = $request->input('comment');

        Remark::create(['comment'=>$comment, 'remark_ct_id'=>$rid, 'project_id'=>$pid, 'user_id'=>$uid]);

        return redirect()
            ->route('detail.index',['pid'=>$pid])
            ->with('status', 'success')
            ->with('info', 'Successfully posted')
            ->with('dt_rid', $rid);
    }

    public function editIndex($id){
        $comment = Remark::findOrFail($id);
        $members = Member::where('project_id', $comment->project_id)->get();
        $project = Project::findOrFail($comment->project_id);
        $followers = Follow::where('followable_id', $comment->project_id)->where('accepted', '1')->get();

        return view('remark.edit', ['project' => $project, 'members' => $members, 'followers'=>$followers, 'comment'=>$comment]);
    }

    public function postEditIndex(Request $request, $id){

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = $request->input('comment');

        Remark::where('id',$id)->update(['comment'=>$comment]);

        $remark = Remark::findOrFail($id);
        return redirect()
            ->route('detail.index',['pid'=>$remark->project_id])
            ->with('status', 'success')
            ->with('info', 'Successfully saved')
            ->with('dt_rid', $remark->remark_ct_id);
    }

    public function deleteIndex($id){
        $remark = Remark::findOrFail($id);

        Remark::where('id', $id)->delete();

        return redirect()
            ->route('detail.index',['pid'=>$remark->project_id])
            ->with('status', 'success')
            ->with('info', 'Successfully deleted')
            ->with('dt_rid', $remark->remark_ct_id);
    }
}
