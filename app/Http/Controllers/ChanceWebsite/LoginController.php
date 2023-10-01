<?php

namespace App\Http\Controllers\ChanceWebsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('ChanceWebsite.auth.login');
    }
    // public function checklogin(LoginRequest $request)
    // {
    //     $Admins = DB::table('admins')->get();
    //     dd('checklogin');
    //     if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
    //         dd('Auth successful');
    //         return redirect()->route('admin.index');
    //     }
    //     return back()->withErrors(['email' => 'error']);
    // }


    public function checklogin(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = DB::table('admins')->get()->where('email', $email)->first();
        if ($admin && ($password == $admin->password)) {
            Auth::guard('admin')->loginUsingId($admin->id);
            return redirect()->route('admin.index');
        } else {
            return back()->withErrors(['email' => 'Invalid Email']);
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // if ($response = $this->loggedOut($request)) {
        //     return $response;
        // }

        return redirect()->route('admin.dashboard.login');
    }
    // public function logout()
    // {
    //     Auth::guard('admin')->logout(); // You can specify the guard you want to log out from (e.g., 'admin')
    //     return redirect()->route('admin.dashboard.login'); // Redirect to the desired page after logout
    // }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard('admin')->user())) {
            return $response;
        }

        return redirect()->route('admin.dashboard.login');
    }


    protected function authenticated(Request $request, $user)
    {
        if (!$user->isRegistered()) {
            return redirect()->route('admin.index');
        }

        return redirect()->route('admin.dashboard.login');
    }
}
