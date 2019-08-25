<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Follow extends Model
{
    protected $table = 'follows';

    protected $fillable = [
        'user_id',
        'accepted',
        'status'
    ];

    public function followable() {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function notifications(){
        return $this->hasMany('App\Notification', 'table_id');
    }

}
