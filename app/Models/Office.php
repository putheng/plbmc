<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'parent_id'];
    
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
    
    public function levels()
    {
        return $this->belongsToMany(Level::class)
            ->withPivot('note')
            ->withTimestamps();;
    }
    
    public function parts()
    {
        return $this->hasMany(Part::class);
    }

}
