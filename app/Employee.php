<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'emp_no', 'birth_date', 'first_name', 'last_name', 'gender', 'hire_date'
    ];
}
