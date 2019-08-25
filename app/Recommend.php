<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'recommends';

    protected $fillable = [
        'body','remark_id','recommend_user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function userTo() {
        return $this->belongsTo('App\User', 'recommend_user_id');
    }

    public function remark(){
        return $this->belongsTo('App\Remark', 'remark_id');
    }

    public function notifications(){
        return $this->hasMany('App\Notification', 'table_id');
    }
}
