<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
    	$id = $request->id;

    	if(!empty($id)){
    		return Officer::where('identity', 'LIKE', '%'. $id .'%')
    				->limit(20)->orderBy('level_id', 'desc')->get();
    	}

    	return Officer::limit(10)->get();
    }
}
