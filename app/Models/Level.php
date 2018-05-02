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
            ->withPivot('note')
            ->withTimestamps();;
    }
    
    public function level()
    {
        return $this->belongsTo(OfficerLevel::class);
    }
}
