<?php

namespace App\Http\Controllers;

use App\Follow;
use Auth;
use Illuminate\Http\Request;

class ProjectFollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $followProjects = Follow::where('user_id', Auth::user()->id)->get();
        return view('project_follow.index')->with('followProjects', $followProjects);
    }
}
