<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Notification;
use App\Project;
use Auth;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $myprojects = Notification::where('to_id', Auth::user()->id)->where('to_del', '0')->orderby('created_at','DESC')->get();


//        $myprojects = Project::where('user_id', Auth::user()->id)->where('acceptance', '0')->limit(100)->orderby('created_at','DESC')->get();
//
//        foreach ($myprojects as $myproject){
//            $myproject->follows()->update(['status'=>'1']);
//            $myproject->data = $myproject->follows()->where('user_del', '0')->orderby('created_at','DESC')->get();
//        }

        Notification::where('to_id', Auth::user()->id)->where('status', '0')->update(['status'=>1]);

        return view('notify.index')
            ->with('myprojects', $myprojects);
    }

    public function followAccepted($fid, $apt){
        Follow::find($fid)->update(['accepted' => $apt]);
        return redirect()->back();
    }

    public function Delete($fid){
        Notification::where('id', $fid)->update(['to_del'=>'1']);
        return redirect()->back();
    }
}