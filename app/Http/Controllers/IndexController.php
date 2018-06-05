<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tie;

class IndexController extends Controller
{
    public function index(){

        $top4 = Tie::where('is_top',"1")
                    ->orderBy("updated_at","desc")
                    ->with('user')
                    ->take(4)
                    ->get();

        return view('index.index',['top4'=>$top4]);
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

    public function tie_index(){

        $tie = Tie::where('is_top',"0")
                    ->orderBy('id','desc')
                    ->with('user')
                    ->paginate(10);
                    
        return $tie;
    }
}
