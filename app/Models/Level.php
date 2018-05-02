<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name'];
    
    public $timestamps = false;
    
    public function officers()
    {
        return $this->belongsToMany(Officer::class)
            ->withPivot(['note', 'office_id'])
            ->withTimestamps();;
    }
    
    public function offices()
    {
        return $this->belongsToMany(Office::class)
            ->withPivot(['note', 'office_id'])
            ->withTimestamps();;
    }
    
    public function level()
    {
        return $this->belongsTo(OfficerLevel::class);
    }
    
    public function office()
    {
        return $this->hasMany                                                         (Office::class);
    }
}
