<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = ['name', 'parent_id'];
    
    public function position($id)
    {
        return $this->officers()->where('position_id', $id)->count();
    }
    
    public function officers()
    {
        return $this->hasMany(Officer::class);
    }
    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
