<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discuss extends Model
{
    protected $fillable = ['content','tie_id'];

    public function user(){

        return $this->belongsTo('App\Models\User','user_id');
    }
    public function tie(){

        return $this->belongsTo('App\Models\Tie','tie_id');
    }
}
