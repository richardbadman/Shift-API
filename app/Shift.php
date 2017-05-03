<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shift';

    protected $primaryKey = 'shiftID';

    protected $fillable = [
        'shiftStart', 'shiftEnd', 'startTime', 'endTime', 'empID', 'created_at', 'updated_at'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'empID');
    }
}
