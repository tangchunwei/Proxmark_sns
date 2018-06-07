<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function tie(){

        return $this->belongsTo('App\Models\Tie','tie_id');
    }
}
