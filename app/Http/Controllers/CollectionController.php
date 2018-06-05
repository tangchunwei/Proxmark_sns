<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function collect(Request $req){

        $collection = new Collection;

        $collection->tie_id = $req->tie_id;
        $collection->user_id = session('id');

        $collection->save();

        return $collection;
    }

    public function collect_del(Request $req){

        $collection = Collection::where('user_id',session('id'))
                                ->where('tie_id',$req->tie_id)
                                ->delete();
        
        
        return $collection;
    }
}
