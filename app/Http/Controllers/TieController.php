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
        $tie->user_id = session('id') ? session('id') : 0;
        
        $tie->save();

        return view('jump')->with([
            'message'=>'贴子发表成功！',
            'name'=>'首页',
            'url' =>'/', 
            'jumpTime'=>1,
        ]);
    }

    public function tie_index($class){

        $tie = Tie::where('class',$class)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);
        
        return view('jie.index',['tie'=>$tie,'class'=>$class]);
    }

    public function class($class){

        $tie = Tie::where('class',$class)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);

        return view('jie.index',['tie'=>$tie,'class'=>$class]);
    }

    public function class_type($class,$type){

        $tie = Tie::where('class',$class)
                    ->where('type',$type)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);
        
        return view('jie.index',['tie'=>$tie,'class'=>$class]);
    }

    public function jingtie($class){

        $tie = Tie::where('is_jing',"1")
                    ->where('class',$class)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);

        return view('jie.index',['tie'=>$tie,'class'=>$class]);
    }

    public function tie_detail($id){

        $tie = Tie::with('user')
                    ->find($id);
        
        $tie->increment('display',1);

        return view('jie.detail',['tie'=>$tie]);
    }

}
