<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'project_id',
        'user_id',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function membersOfProject(){
        return $this->where('user_id', Auth::user()->id)->where('status', '1')->get();
    }
}
