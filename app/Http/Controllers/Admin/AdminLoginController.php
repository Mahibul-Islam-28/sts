<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    function login()
    {
        return view('admin.login');
    }
    function logData(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('email', '=', $email)
                        ->where('password', '=', $password)
                        ->first();
        if($admin)
        {
                $request->session()->put('admin', $admin);

                return redirect(route('dashboard'))
                        ->with('success','You have successfully logged in');
        }
        else{
            return back()->with('error', 'Email and Password Not Matched.');
        }
    }
    // Logout
    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('adminLogin'));
    }
}
