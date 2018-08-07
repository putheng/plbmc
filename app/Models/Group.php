<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];
    
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
    
    public function parts()
    {
        return $this->hasManyThrough(Part::class, Office::class);
    }
}
