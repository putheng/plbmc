<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = ['name', 'parent_id'];
    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
