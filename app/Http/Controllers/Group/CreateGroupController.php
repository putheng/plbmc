<?php

namespace App\Http\Controllers\Group;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateGroupController extends Controller
{
    public function show()
    {
        return view('group.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:groups,name',
        ]);
        
        Group::create(['name' => $request->name]);
        
        return back()->withSuccess('Group create successfully.');
    }
}
