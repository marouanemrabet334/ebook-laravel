<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
      /**
     * Display the login view.
     */
    public function index()
    {
        return view('auth.login');
    }

   
      public function login(AuthRequest $request)
    {
        if ($request->validated()) {
            $credentials = $request->only('email', 'password');
            $remember_me = $request->has('remember_me') ? true : false;

            if (Auth::attempt($credentials, $remember_me)) {
                $request->session()->regenerate();

                // Check if user is regular user
                if(Auth::user()->user_type === 'user'){
                    return redirect()->intended('user.index')->with('msg','User logged in successfully');
                } else {
                    // If admin tries to login via user login, redirect to admin
                    Auth::logout();
                    return redirect()->route('admin.login.index')->with('msg','Please use admin login');
                }
            } else {
                return back()->withInput()->withErrors([
                    'email' => 'These credentials do not match our records.',
                    'password' => 'The password you entered is incorrect.',
                ]);
            }
        }

        return redirect()->back()->with('msg','Login failed');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}