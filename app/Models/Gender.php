<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $timestamps = false;

    public function officer()
    {
    	return $this->belongsTo(Officer::class);
    }
}
