<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tie;
use DB;
use Cache;
use App\Models\Discuss;

class IndexController extends Controller
{
    public function index(Request $req){

        if($req->keyword){

            $keyword = $req->keyword;
        }else {

            $keyword = "";
        }
        
        //$top5 =  Cache::remember('top5', 60, function(){

            $top5 = Tie::where('type','分享')
                    ->orderBy('display','desc')
                    ->where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->take(5)
                    ->get();
        //});

        //$top12 =  Cache::remember('top12', 60, function(){
            
            $top12 = Discuss::select('user_id',DB::raw('count(user_id) as count')) 
                            ->where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                            ->orderBy(DB::raw(count('user_id')),'desc')
                            ->groupBy('user_id')   
                            ->with('user')
                            ->take(12)
                            ->get();
        //});
        
        $top10 = Tie::where('created_at','>=',DB::raw('NOW() - INTERVAL 7 DAY'))
                    ->orderBy('discuss','desc')
                    ->take(10)
                    ->get();
        
                            


        $top4 = Tie::where('is_top',"1")
                    ->orderBy("updated_at","desc")
                    ->with('user')
                    ->take(4)
                    ->get();

        return view('index.index',['top4'=>$top4,'top5'=>$top5,'top12'=>$top12,'top10'=>$top10,'keyword'=>$keyword]);
    }

    public function tie_list($type,$is_jing){

        if($is_jing==" "){

            if($type==" "){

                $tie = Tie::where('is_top',"0")
                        ->orderBy('id','desc')
                        ->with('user')
                        ->paginate(10);
                
            }else if($type=="分享"){

                $tie = Tie::where("type","分享")
                            ->where('is_top',"0")
                            ->orderBy('id','desc')
                            ->with('user')
                            ->paginate(10);
            }else {

                $tie = Tie::where("type","提问")
                            ->where('is_top',"0")
                            ->orderBy('id','desc')
                            ->with('user')
                            ->paginate(10);
            }
        }else {

            $tie = Tie::where('is_jing',"1")
                        ->where('is_top',"0")
                        ->orderBy('id','desc')
                        ->with('user')
                        ->paginate(10);
        }

        return $tie;
    }

    public function tie_index(Request $req){
        

        if($req->keyword){
              
            $tie = Tie::where('title','like',"%$req->keyword%")
                        ->where('is_top',"0")
                        ->orderBy('id','desc')
                        ->with('user')
                        ->paginate(10);
        
        }else {

            $tie = Tie::where('is_top',"0")
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(10);
        }

          
        return $tie;
    }
}
