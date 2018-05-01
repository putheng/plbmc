<?php

namespace App\Models;

use App\Models\Office;
use App\Models\Officer;
use Illuminate\Database\Eloquent\Model;

class OfficerStatus extends Model
{
    protected $table = 'officer_status';
    
    public $timestamps = false;
    
    protected $dates = ['dates'];
    
    protected $fillable = [
        'officer_id',
        'status_id',
        'office_id',
        'dates'
    ];
    
    public function scopeUserExists($query, $officer, $date)
    {
        return $query
            ->where('officer_id', $officer)
            ->where('dates', $date)
            ->get();
    }
    
    public function offices()
    {
        return $this->hasMany(Office::class);
    }
    
    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
    
    public function officers()
    {
        return $this->hasMany(Officer::class);
    }
    
}
