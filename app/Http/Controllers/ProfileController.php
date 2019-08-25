<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Profile;
use App\Project;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
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
    public function index()
    {
        return view('profile.index');
    }

    public function edit(Request $request){

        $id = Auth::user()->id;
        $this->validate($request, [
            'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255|unique:users,name,'.$id,
            'age' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'city' => 'required',
            'study' => 'required',
            'interest' => 'required',
        ]);

        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/user/');
            $image->move($destinationPath, $name);

        }else{
            $name = 'male.png';
        }

        User::where('id', $id)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'avatar'=>$name,
        ]);

        if(Auth::user()->hasProfile()){
            Profile::where('user_id', $id)->update([
                'age'=>$request->input('age'),
                'city'=>$request->input('city'),
                'study'=>$request->input('study'),
                'interest'=>$request->input('interest'),
            ]);
        }else {
            Auth::user()->profile()->create([
                'age'=>$request->input('age'),
                'city'=>$request->input('city'),
                'study'=>$request->input('study'),
                'interest'=>$request->input('interest'),
            ]);
        }

        return redirect()
            ->back()
            ->with('info', 'Your profile is updated successfully.');
    }

    public function member($uid){
        $member = User::find($uid);

        $projects = Project::where('member', 'LIKE', "%{$uid}%")->orderBy('created_at', 'desc')->paginate(3)->setPath ( '' );

        return view('profile.member.member', ['member'=>$member, 'projects'=>$projects]);
    }

    public function info($mid){
        $member = User::find($mid);
        return view('profile.member.info', ['member'=>$member]);
    }

    public function projectFollowing($mid){
        $member = User::find($mid);
        $projects = Follow::where('user_id', $mid)->get();
        return view('profile.member.project', ['member'=>$member, 'projects'=>$projects]);
    }
}
