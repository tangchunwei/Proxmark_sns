<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TieRequest;
use App\Models\Tie;
use App\Models\Question;
use DB;
use App\Models\Collection;

class TieController extends Controller
{
    public function add(){
        $questions=Question::getQuestions();
        return view('jie.add',[
            'questions'=>$questions,
            ]);
    }

    public function doadd(TieRequest $req){
        //判断回答的问题答案是否正确
        $data= DB::table('question')->select('answer')
            ->where('answer',$req->answer)
            ->get()
            ->isEmpty();
        if($data){
            // 回答错误
            return back()->withErrors('回答错误！');
        }
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
        
        $top10 = Tie::where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->orderBy('discuss','desc')
                    ->take(10)
                    ->get();

        
        return view('jie.index',['tie'=>$tie,'class'=>$class,'top10'=>$top10]);
    }

    public function class($class){

        $tie = Tie::where('class',$class)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);

        $top10 = Tie::where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->orderBy('discuss','desc')
                    ->take(10)
                    ->get();

        return view('jie.index',['tie'=>$tie,'class'=>$class,'top10'=>$top10]);
    }

    public function class_type($class,$type){

        $tie = Tie::where('class',$class)
                    ->where('type',$type)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);

        $top10 = Tie::where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->orderBy('discuss','desc')
                    ->take(10)
                    ->get();
        
        return view('jie.index',['tie'=>$tie,'class'=>$class,'top10'=>$top10]);
    }

    public function jingtie($class){

        $tie = Tie::where('is_jing',"1")
                    ->where('class',$class)
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(3);

        $top10 = Tie::where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->orderBy('discuss','desc')
                    ->take(10)
                    ->get();

        return view('jie.index',['tie'=>$tie,'class'=>$class,'top10'=>$top10]);
    }

    public function tie_detail($id){

        $tie = Tie::with('user')
                    ->find($id);
        $collection = Collection::where('user_id',session('id'))
                                ->where('tie_id',$id)
                                ->count();
        $tie->increment('display',1);

        $top10 = Tie::where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->orderBy('discuss','desc')
                    ->take(10)
                    ->get();

        return view('jie.detail',['tie'=>$tie,'collection'=>$collection,'top10'=>$top10]);
    }

}
