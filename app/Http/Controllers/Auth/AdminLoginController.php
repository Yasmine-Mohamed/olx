<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /**
     * AdminLoginController constructor.
     *
     * Define middleware
     */
    public function __construct()
    {
        return $this->middleware('guest:admin',['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //Validate admin form

        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //attempt to log admins in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {

            //if successful, then redirect to admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        //if unsuccessful , then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember_me'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
