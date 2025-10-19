<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminAuthController extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.login');
    }


    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        if ($request->validated()) {
            $credentials = $request->only('email', 'password');
            $rememberMe = $request->boolean('remember');

            if (Auth::attempt($credentials, $rememberMe)) {
                $request->session()->regenerate();

                // Track device

                // Redirect based on user type
                if (Auth::user()->user_type === 'admin') {

                    return redirect()->intended(route('admin.dashboard.index'))->with('msg', 'Admin logged in successfully');
                } else {

                    Auth::logout();
                    return back()->withInput()->withErrors([
                        'email' => 'Access denied. Admin credentials required.',
                    ]);
                }
            } else {
                return back()->withInput()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                    'password' => 'The password you entered is incorrect.',
                ]);
            }
        }


        return redirect()->back()->with('msg', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
