<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'age',
        'city',
        'study',
        'interest',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
