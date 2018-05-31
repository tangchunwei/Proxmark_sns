<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Question extends Model
{

        public static function getQuestions(){
            $num=rand(1,15);
            return  DB::table('question')->select('question')
                            ->where('id',$num)
                            ->get();
        }

}
