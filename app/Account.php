<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $connection = 'off_boarding_dev';
    use Notifiable;
}
