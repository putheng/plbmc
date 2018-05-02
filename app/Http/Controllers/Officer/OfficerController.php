<?php

namespace App\Http\Controllers\Officer;

use App\Models\Group;
use App\Models\Office;
use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficerController extends Controller
{
    public function edit(Officer $officer)
    {
        return view('officer.edit', compact('officer'));
    }
    
    public function level(Officer $officer)
    {
        return view('officer.level', compact('officer'));
    }
    
    public function position(Officer $officer)
    {
        return view('officer.position', compact('officer'));
    }
    
    public function store(Request $request, Officer $officer)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'identity' => 'required',
            'position' => 'required|exists:positions,id',
            'level' => 'required|exists:levels,id',
            'phone' => 'required',
        ]);
        
        $officer->name = $request->name;
        $officer->identity = $request->identity;
        $officer->gender = $request->gender;
        $officer->level_id = $request->level;
        $officer->position_id = $request->position;
        $officer->phone = $request->phone;
        $officer->office_id = $request->office;
        
        
        $officer->save();
        
        return back()->withSuccess('Created successfuly');
    }
    
    public function index(Group $group)
    {
        return view('officer.office', compact('group'));
    }
    
    public function group()
    {
        $groups = Group::get();
        return view('officer.group', compact('groups'));
    }
    
    public function show(Officer $officer)
    {
        return view('officer.index', compact('officer'));
    }
    
    public function office(Office $office)
    {
        $officers = $office->officers()->orderBy('id', 'asc')->get();
        return view('officer.show', compact('officers', 'office'));
    }
}
