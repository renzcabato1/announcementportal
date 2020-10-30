<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcessUsage extends Model
{
    //
    protected $connection = 'hr_portal';
    public function created_at_info()
    {
        return $this->hasOne(User::class,'id','created_by');
    }
    public function bill_upload_info()
    {
        return $this->belongsTo(BillUpload::class,'bill_upload_id','id');
    }
}
