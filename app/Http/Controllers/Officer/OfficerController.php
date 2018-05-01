<?php

namespace App\Http\Controllers\Officer;

use App\Models\Group;
use App\Models\Office;
use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficerController extends Controller
{
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
