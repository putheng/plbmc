<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name'];
    
    public $timestamps = false;
    
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    
    public function officers()
    {
        return $this->hasMany(Officer::class);
    }
    
    public function status()
    {
        return $this->hasMany(OfficerStatus::class);
    }
}
