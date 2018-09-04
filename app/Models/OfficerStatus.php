<?php

namespace App\Models;

use App\Models\Status;
use App\Models\Office;
use App\Models\Officer;
use Illuminate\Database\Eloquent\Model;

class OfficerStatus extends Model
{
    protected $table = 'officer_status';
    
    public $timestamps = false;
    
    protected $dates = ['dates'];
    
    protected $fillable = [
        'officer_id',
        'status_id',
        'office_id',
        'dates'
    ];

    public function getOffice()
    {
        return Office::where('id', $this->office_id);
    }

    public function getCount($date, $status)
    {
        return $this->whereDate('dates', $date)
                ->where('office_id', $this->office_id)
                ->where('status_id', $status)->count();
    }
    
    public function scopeUserExists($query, $officer, $date)
    {
        return $query
            ->where('officer_id', $officer)
            ->where('dates', $date)
            ->get();
    }
    
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
    
    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
    
    public function officers()
    {
        return $this->hasMany(Officer::class);
    }

    public function getStatus()
    {
        return Status::where('id', $this->status_id)->first();
    }

    public function status($date, $status)
    {
        return $this->whereDate('dates', $date)->where('status_id', $status)->count();
    }
    
}
