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

}
