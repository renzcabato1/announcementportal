<?php

namespace App\Http\Controllers;
use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function seen_by_user(Request $request)
    {
        $data = new Account;
        $data->announcement_id  = $request->id;
        $data->seen_by = auth()->user()->id;
        $data->save();

        return ('sucess!');

    }
}
