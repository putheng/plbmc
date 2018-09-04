<?php

namespace App\Http\Controllers\Checking;

use Carbon\Carbon;
use App\Models\Status as Statuses;
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

    public function dateon(Request $request)
    {
        $offices = Status::select('office_id')
                ->whereDate('dates', $request->date)
                ->groupBy('office_id')
                ->get();

        return view('check.dateon', compact('offices'));
    }

    public function officedate(Office $office)
    {
        return view('check.officedate', compact('office'));
    }

    public function status(Statuses $status, Request $request)
    {

        $offices  = $status->offices()
                ->select('office_id')
                ->whereDate('dates', $request->date)
                ->groupBy('office_id')->get();

        return view('check.status', compact('status', 'offices'));
    }

    public function officeStatus(Office $office, Statuses $status, Request $request)
    {
        $lists = Status::where('status_id', $status->id)
                ->where('office_id', $office->id)
                ->whereDate('dates', $request->date)->get();

        return view('check.officeStatus', compact('status', 'office', 'lists'));
    }

    public function date(Request $request)
    {

        $from = Carbon::parse($request->from);

        $to = Carbon::parse($request->to);

        $dates = Status::select('dates')
                ->whereBetween('dates', [$from, $to])
                ->groupBy('dates')->orderBy('dates', 'asc')->get();
    
        return view('check.date', compact('dates'));
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

        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $query = $office->status()->select('officer_status.dates')
                ->whereBetween('dates', [$start, $end])
                ->groupBy('dates')->get();
        
        $officers = $office->officers()
                ->orderBy('position_id', 'asc')
                ->orderBy('level_id', 'desc')
                ->orderBy('identity', 'asc')
                ->get();
        
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
