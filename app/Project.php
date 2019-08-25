<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'image',
        'field',
        'member',
        'search_key',
        'acceptance',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'project_id');
    }

    public function beMemberofProject(){
        $member = new Member();
        return (bool) $this->where('user_id', Auth::user()->id)->where('id', $this->id)
                ->orWhereIn('id', $member->membersOfProject()->where('project_id', $this->id)->pluck('project_id'))->count();
    }

    public function follows() {
        return $this->morphMany('App\Follow', 'followable');
    }

    public function followerofProject(){
        $member = new Member();
        return (bool) $this->where('id', $this->id)->where('user_id', Auth::user()->id)
            ->orWhereIn('id', $member->membersOfProject()->where('project_id', $this->id)->pluck('project_id'))
            ->orWhereIn('id', $this->follows()->where('user_id', Auth::user()->id)->where('accepted', '1')->pluck('followable_id'))->count();

    }

    public function followRequestPending(){
        return $this->follows()->where('followable_id', $this->id)->get();
    }

    public function hasFollowPending(){
        return (bool) $this->followRequestPending()->where('accepted', '0')->where('user_id', Auth::user()->id)->count();
    }

    public function notification(){
        return $this->hasMany('App\Notification', 'project_id');
    }
}
