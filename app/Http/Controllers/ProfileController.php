<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ProfileController extends Controller
{
    protected function editprofile(StoreProfileRequest $request)
    {
    	$user_id = Auth::user()->id;
    	$data = array_filter($request->all());
        User::find($user_id)->save($data);
    }
}
