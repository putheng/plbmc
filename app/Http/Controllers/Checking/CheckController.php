<?php

namespace App\Http\Controllers\Checking;

use App\Models\Group;
use App\Models\Office;
use App\Models\OfficerStatus as Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckController extends Controller
{
    public function index()
    {
        $groups = Group::get();
        return view('check.index', compact('groups'));
    }
    
    public function show()
    {
        $groups = Group::get();
        return view('check.show', compact('groups'));
    }
    
    public function showGroup(Group $group)
    {
        return view('check.showGroup', compact('group'));
    }
    
    public function showOffice(Office $office)
    {
        
        $query = $office->status()->select('officer_status.dates')->groupBy('dates')->get();
        
        $officers = $office->officers()->orderBy('level_id', 'desc')->get();
        
        //dd($query);
        return view('check.officeShow', compact('query', 'office', 'officers'));
    }
    
    public function group(Group $group)
    {
        return view('check.group', compact('group'));
    }
    
    public function offices(Office $office)
    {
        return view('check.office', compact('office'));
    }
    
    public function store(Request $request, Office $office)
    {   
        
        $this->validate($request, [
            'dates' => 'required',
        ]);
        
        foreach($request->result as $officer => $status){
            
            Status::create([
                'officer_id' => $officer,
                'status_id' => $status,
                'office_id' => $office->id,
                'dates' => $request->dates,
            ]);
        }
        
        return back()->withSuccess('Completed');
    }
}
