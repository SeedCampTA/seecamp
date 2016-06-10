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
        $req = $request->all();
        if (trim($req['image'])) {
            $req['image'] = base64_encode(file_get_contents($req['image']));
        }
        $data = array_filter($req);
        $user = \Auth::user()->update($data);

        $updateMsg = 'Update profile completed';

        return redirect('/profile/edit')
            ->with('updateMsg', $updateMsg);
    }
}
