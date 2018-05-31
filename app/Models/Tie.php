<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tie extends Model
{
    // 允许被填充的字段
    protected $fillable = ['class','title','type','content'];
}
