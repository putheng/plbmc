<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficerLevel extends Model
{
    protected $table = 'level_officer';
    
    protected $fillable = ['note'];
    
    public function levels()
    {
        return $this->hasMany(Level::class);
    }
    
    public function officers()
    {
        return $this->hasMany(Officer::class);
    }
}
