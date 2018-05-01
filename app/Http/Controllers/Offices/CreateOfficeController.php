<?php

namespace App\Http\Controllers\Offices;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateOfficeController extends Controller
{
    public function show()
    {
        return view('offices.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:offices,name',
            'group' => 'required|exists:groups,id'
        ]);
        
        $office = new Office;
        
        $office->name = $request->name;
        $office->group_id = $request->group;
        
        $office->save();
        
        return back()->withSuccess('Successfully created');
    }
}
