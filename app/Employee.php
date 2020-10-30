<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    protected $connection = 'hr_portal';

    public function EmployeeCompany()
    {
        return $this->belongsToMany(Company::class);
    }
    
    public function EmployeeDepartment()
    {
        return $this->belongsToMany(Department::class);
    }
    public function EmployeeLocation()
    {
        return $this->belongsToMany(Location::class);
    }
}
