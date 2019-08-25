<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark_ct extends Model
{
    protected $table = 'remark_ct';

    protected $fillable = [
        'remark',
    ];

    public function remarks(){
        return $this->hasMany('App\Remark','remark_ct_id');
    }
}
