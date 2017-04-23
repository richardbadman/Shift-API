<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $primaryKey = 'empID';

    protected $fillable = [
        'firstName', 'lastName', 'isAdmin', 'created_at', 'updated_at'
    ];

    public function shifts() {
        return $this->hasMany(Shift::class);
    }
}
