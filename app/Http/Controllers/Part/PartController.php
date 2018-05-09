<?php

namespace App\Http\Controllers\Part;

use App\Models\Part;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    public function show()
    {
        return view('parts.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'group' => 'required|exists:offices,id'
        ]);
        
        $part = new Part;
        
        $part->name = $request->name;
        $part->office_id = $request->group;
        
        $part->save();
        
        return back()->withSuccess('Created');
    }
}
