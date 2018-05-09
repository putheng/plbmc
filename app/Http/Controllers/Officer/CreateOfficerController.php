<?php

namespace App\Http\Controllers\Officer;

use App\Models\Office;
use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateOfficerController extends Controller
{
    public function offices()
    {
        return view('officer.offices');
    }
    
    public function show(Office $office)
    {
        return view('officer.create', compact('office'));
    }
    
    public function store(Request $request, Office $office)
    {
        $this->validate($request, [
            'name' => 'required|unique:officers,name',
            'gender' => 'required',
            'identity' => 'required',
            'position' => 'required|exists:positions,id',
            'identity' => 'required|unique:officers,identity',
            'level' => 'required|exists:levels,id',
            'phone' => 'required',
        ]);
        
        $officer = new Officer;
        
        $officer->name = $request->name;
        $officer->identity = $request->identity;
        $officer->gender = $request->gender;
        $officer->level_id = $request->level;
        $officer->position_id = $request->position;
        $officer->phone = $request->phone;
        
        $officer->office()->associate($office);
        
        $officer->save();
        
        return back()->withSuccess('Created successfuly');
    }
    
}
