<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discuss;
use App\Models\Tie;

class DiscussController extends Controller
{
    public function discuss(Request $req){

        $discuss = new Discuss;
        $discuss->fill($req->all());
        $discuss->user_id=session('id');

        $tie = Tie::find($req->tie_id);
        $tie->increment('discuss',1);

        $discuss->save();

        return $discuss;
    }   

    public function discuss_index($tie_id){

        return Discuss::where('tie_id',$tie_id)
                        ->orderBy('id','desc')
                        ->with('user')
                        ->paginate(5);
    }
}
