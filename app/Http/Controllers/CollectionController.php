<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function addToCollection(Request $request, $slug) 
    {
        $info = Information::where('slug', $slug)->first();
        $collection = new Collection([
            'user_id' => Auth::guard('student')->user()->id,
            'info_id' => $info->id,
        ]);

        $collection->save();

        return redirect()->back();
    }
    
    public function deleteToCollection($slug) 
    {
        $info = Information::where('slug', $slug)->first();
        $collection = Collection::where('user_id', Auth::guard('student')->user()->id)->where('info_id', $info->id)->first();

        $collection->delete();

        return redirect()->back();
    }
}