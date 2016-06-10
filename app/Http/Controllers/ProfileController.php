<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ProfileController extends Controller
{
    protected function editprofile(StoreSProfileRequest $request)
    {
        User::find(Auth::user()->id)->save($request->all());
    }
}
