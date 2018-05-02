<?php

namespace App\Models;

use App\Models\Level;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    public function levels()
    {
        return $this->belongsToMany(Level::class)
            ->withPivot('note')
            ->withTimestamps();
    }
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    
    public function status()
    {
        return $this->hasMany(Status::class);
    }
    
    public function check($date, $id)
    {
        $status = OfficerStatus::where('dates', $date)
                ->where('officer_id', $id)
                ->first()->status_id;
                
        return Status::find($status)->name;
    }
}
