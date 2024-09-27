<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class LoginController extends Controller
{
    function login()
    {
        return view('login');
    }
    function logData(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $customer = Customer::where('email', '=', $email)
                        ->where('password', '=', $password)
                        ->first();
        if($customer)
        {
            $request->session()->put('customer', $customer);

            return redirect(route('index'))
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
        return redirect(route('customerLogin'));
    }
}
