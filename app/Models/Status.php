<?php

namespace App\Models;

use App\Models\Office;
use App\Models\OfficerStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Status extends Model
{
    protected $fillable = ['name'];
    
    public $timestamps = false;

    public function office($date)
    {
    	return OfficerStatus::select('office_id')
				->where('status_id', $this->id)
				->whereDate('dates', '=', $date)
				->groupBy('office_id')->get();
    }

    public function getTotal($from, $to)
    {
        return OfficerStatus::whereDate('dates', '>=', $from)
                ->whereDate('dates', '<=', $to)
                ->where('status_id', $this->id)
                ->count();
    }

    public function getOfficeCount($office, $date)
    {
        return OfficerStatus::whereDate('dates', $date)
                ->where('status_id', $this->id)
                ->where('office_id', $office)
                ->count();
    }

    public function getTotalOfficeCount()
    {
        return OfficerStatus::whereDate('dates', request()->date)
                ->where('status_id', $this->id)
                ->count();
    }

    public function getCount($date)
    {
        return OfficerStatus::where('status_id', $this->id)
                ->whereDate('dates', $date)
                ->get();
    }

    public function offices()
    {
    	return $this->hasOne(OfficerStatus::class);
    }


}
