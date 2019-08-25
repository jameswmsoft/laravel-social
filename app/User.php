<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany('App\Project', 'user_id');
    }

    public function members(){
        return $this->hasMany('App\Member', 'user_id');
    }

    public function follows(){
        return $this->hasMany('App\Follow', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'user_id');
    }
    public function recommends() {
        return $this->hasMany('App\Recommend', 'user_id');
    }

    public function recommendsTo(){
        return $this->hasMany('App\Recommend', 'recommend_user_id');
    }

    public function profile(){
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function hasProfile(){
        return (bool) $this->profile()->where('user_id', $this->id)->count();
    }

    public function getName() {
        return $this->name;
    }

    public function getAge(){
        if ($this->hasProfile()){
            return $this->profile->age;
        }else {
            return '';
        }
    }

    public function getCity(){
        if ($this->hasProfile()){
            return $this->profile->city;
        }else {
            return '';
        }
    }

    public function getStudy(){
        if ($this->hasProfile()){
            return $this->profile->study;
        }else {
            return '';
        }
    }

    public function getInterest(){
        if ($this->hasProfile()){
            return $this->profile->interest;
        }else {
            return '';
        }
    }

    public function getAvatarURL() {
        if ($this->avatar == 'male.png') {
            return asset('assets/images/users/male.png');
        }else {
            return asset('uploads/user').'/'.$this->avatar;
        }
    }

    public function hasFollowedProject(Project $project) {
        return (bool) $project
            ->follows
            ->where('user_id', $this->id)
            ->count();
    }

    public function followingProject() {
        return Follow::where('user_id', $this->id)
            ->get();
    }

    public function partners(){
        $members = Project::where('user_id', $this->id)->select('member')->pluck('member');

        $parnter_id = array();
        for ($i=0;$i<count($members);$i++){
            $parnter_id = array_merge($parnter_id, explode(',', $members[$i]));
        }

        $parnter_id = array_unique($parnter_id);

        $parnters = User::whereIn('id', $parnter_id)->get();

        return $parnters;
    }

    public function hasPendingFollowOfMP(){
        $myprojects = Project::where('user_id', $this->id)->limit(50)->get();

        $hasPendingFollowOfMP = 0;
        foreach ($myprojects as $myproject){
            $hasPendingFollowOfMP += $myproject->followRequestPending()->where('accepted', '0')->where('status', '0')->count();
        }
        return $hasPendingFollowOfMP;
    }

    public function interestedProject(){
        $Projectfields = Project::where('user_id', $this->id)->select('field')->orderby('created_at', 'DESC')->pluck('field');

        $fields = array();
        for ($i=0;$i<count($Projectfields);$i++){
            $fields = array_merge($fields, explode(',', $Projectfields[$i]));
        }

        $projects = '';
        for($i=0;$i<count($fields);$i++){
            if($i == 0){
                $projects = Project::Where('field', 'LIKE', "%{$fields[0]}%")->where('user_id', '!=', $this->id)->get();
            }else {
                $projects = $projects->merge(Project::Where('field', 'LIKE', "%{$fields[$i]}%")->where('user_id', '!=', $this->id)->paginate(30));
            }
        }
        return $projects;
    }

    public function notificationUnread(){
        return Notification::where('to_id', $this->id)->where('status', '0')->where('to_del', '0')->count();
    }

    public function notificationFrom(){
        return $this->hasMany('App\Notification', 'from_id');
    }

    public function notificationTo(){
        return $this->hasMany('App\Notification', 'to_id');
    }

    public function myProjects(){
        return Project::where('user_id', $this->id)->get();
    }
}
