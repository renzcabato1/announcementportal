<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoEmployee extends Model
{
    //
// protected $connection = 'hr_portal';
    public function surveys()
    {
        return $this->hasMany(LimitSurvey::class,'user_id','user_id');
    }
    public function info()
    {
    return $this->hasOne(Employee::class,'user_id','user_id');
    }
   
}
