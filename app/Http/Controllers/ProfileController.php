<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('user.profile')->with('user', \Auth::user());
    }

    public function update(\App\Http\Requests\StoreProfileRequest $request)
    {
        $data = $request->all();
        $user = \Auth::user();
        $user->update($data);

        $updateMsg = 'Update profile completed';

        return redirect('/profile/edit')
            ->with('updateMsg', $updateMsg);
    }

}
