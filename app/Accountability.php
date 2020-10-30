<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountability extends Model
{
    //
    public function billing_info()
    {
        return $this->hasMany(Billing::class,'account_id','account_number');
    }
}
