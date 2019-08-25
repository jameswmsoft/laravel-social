<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Member;
use App\Project;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = new Project();
        $projects = $project->orderBy('created_at', 'desc')->get();

        return view('index')
            ->with('projects', $projects);
    }
}
