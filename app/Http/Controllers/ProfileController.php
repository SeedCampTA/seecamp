<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ProfileController extends Controller
{
    protected function editprofile(ProfileRequest $request)
    {
        User::find($request->user()->id)->save($request);
    }
}
