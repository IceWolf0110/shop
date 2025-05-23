<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Trang admin
        } else {
            return redirect()->route('home'); // Trang home như bạn gửi
        }
    }

    return back()->withErrors([
        'email' => 'Tài khoản hoặc mật khẩu không đúng.',
    ]);
}
}