<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('user.profile')->with('user', \Auth::user());
    }

    public function update(\App\Http\Requests\StoreProfileRequest $request)
    {
        $user_id = Auth::user()->id;
    	$data = array_filter($request->all());
        User::find($user_id)->save($data);
    }
}
