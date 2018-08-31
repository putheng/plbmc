<?php

namespace App\Models;

use App\Models\Level;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $fillable = [
                    'name' ,
                    'indentify',
                    'gender',
                    'level_id',
                    'position_id',
                    'phone',
                    'birthday',
                    'start_word',
                    'office_id'   
                ];
    
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
            ->withPivot(['note', 'office_id'])
            ->withTimestamps();
    }
    
    public function ScopeGetPosition($q, $value)
    {
        $check = $q->where('position_id', $value);

        return empty($this->part_id) ? $check->count() : '';
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class)
            ->withPivot(['note', 'office_id'])
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
