<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tie;

class IndexController extends Controller
{
    public function index(){

        return view('index.index');
    }

    public function tie_list($type,$is_jing){

        if($is_jing==" "){

            if($type==" "){

                $tie = Tie::paginate(10);
            }else if($type=="分享"){

                $tie = Tie::where("type","分享")
                            ->paginate(10);
            }else {

                $tie = Tie::where("type","提问")
                            ->paginate(10);
            }
        }else {

            $tie = Tie::where('is_jing',"1")
                        ->paginate(10);
        }

        return $tie;
    }
}
