<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TieRequest;
use App\Models\Tie;

class TieController extends Controller
{
    public function add(){

        return view('jie.add');
    }

    public function doadd(TieRequest $req){

        $tie = new Tie;
        $tie->fill($req->except('vercode'));
        $tie->user_id = session('id') ? session('id') : 1;
        
        $tie->save();

        return view('jump')->with([
            'message'=>'贴子发表成功！',
            'name'=>'首页',
            'url' =>'/', 
            'jumpTime'=>3,
        ]);
    }
}
