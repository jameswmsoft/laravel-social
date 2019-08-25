<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'from_id',
        'to_id',
        'table_type',
        'table_id',
        'project_id',
        'status',
        'to_del',
    ];

    public function userFrom(){
        return $this->belongsTo('App\User', 'from_id');
    }

    public function userTo(){
        return $this->belongsTo('App\User', 'to_id');
    }

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function recommend(){
        return $this->belongsTo('App\Recommend', 'table_id');
    }

    public function follow(){
        return $this->belongsTo('App\Follow', 'table_id');
    }
}
