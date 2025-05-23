<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.forgot_password', [
            'showEmailForm' => true,
            'showPasswordForm' => false,
            'passwordChanged' => false,
            'errorMessage' => null
        ]);
    }

    public function reset(Request $request)
    {
        if ($request->has('submit_email')) {
            $request->validate([
                'email' => 'required|email|exists:users'
            ]);

            Session::put('reset_email', $request->email); // Lưu email vào session
            return view('auth.forgot_password', [
                'showEmailForm' => false,
                'showPasswordForm' => true,
                'passwordChanged' => false,
                'errorMessage' => null
            ]);
        }

        if ($request->has('submit_new_password')) {
            $request->validate([
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password'
            ]);

            $email = Session::get('reset_email');
            if (!$email) {
                return view('auth.forgot_password', [
                    'showEmailForm' => true,
                    'showPasswordForm' => false,
                    'passwordChanged' => false,
                    'errorMessage' => 'Email không hợp lệ hoặc phiên hết hạn.'
                ]);
            }

            $user = User::where('email', $email)->first();
            if ($user) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                Session::forget('reset_email');
                return view('auth.forgot_password', [
                    'showEmailForm' => false,
                    'showPasswordForm' => false,
                    'passwordChanged' => true,
                    'errorMessage' => null
                ]);
            }
        }

        return redirect('/forgot-password');
    }
}