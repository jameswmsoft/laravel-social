<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $table = 'remarks';

    protected $fillable = [
        'comment',
        'remark_ct_id',
        'project_id',
        'user_id'
    ];

    public function remark_ct(){
        return $this->belongsTo('App\Remark_ct','remark_ct_id');
    }

    public function recommends(){
        return $this->hasMany('App\Recommend', 'remark_id');
    }
}
