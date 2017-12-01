<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function ResetPassword(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'password' => 'required|string|min:6|confirmed'
            ]);

        if ($validator->fails())
        {
            return redirect("/profile")->withErrors($validator->errors()->first());
        }

        $user = Auth::user();
        $user->password = Hash::make($request->get("password"));
        $user->save();
        return redirect("/profile");
    }
}
