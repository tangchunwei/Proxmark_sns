<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use DB;

class User extends Model
{
    // 设置一个白名单
    protected $fillable = ['mobile','password','name','email'];

}
