<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('email', $email)->where("password", $password)->first();

        if (!$user) {
            return redirect()->back();
        }

        $request->session()->put('USER_EMAIL', $user->email);

        $request->session()->put('USER_ID', $user->id);

        return redirect()->route('products.index');
    }
}
