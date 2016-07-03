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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->getRealPath();
            $mime_type = $request->file('image')->getClientOriginalExtension();
            $destination_path = 'profiles/' . $user->id . '.' . $mime_type;
            \Storage::put(
                $destination_path,
                file_get_contents($path)
            );
            $user->image = $destination_path;
            $user->save();
        }

        $updateMsg = 'Update profile completed';

        return redirect('/profile/edit')
            ->with('updateMsg', $updateMsg);
    }
}
