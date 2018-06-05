<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tie extends Model
{
    // 允许被填充的字段
    protected $fillable = ['class','title','type','content'];

    public function user(){

        return $this->belongsTo("App\Models\User",'user_id');
    }
}
