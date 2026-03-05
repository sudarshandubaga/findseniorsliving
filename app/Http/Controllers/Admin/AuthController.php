<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'captcha' => 'required',
        ]);

        // Simple math captcha validation
        $captchaAnswer = session('captcha_answer');
        if ((int) $request->captcha !== (int) $captchaAnswer) {
            return back()->withErrors(['captcha' => 'Incorrect captcha answer.'])->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }

    public function generateCaptcha()
    {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $operators = ['+', '-'];
        $operator = $operators[array_rand($operators)];

        if ($operator === '+') {
            $answer = $num1 + $num2;
        } else {
            // Ensure positive result
            if ($num1 < $num2) {
                [$num1, $num2] = [$num2, $num1];
            }
            $answer = $num1 - $num2;
        }

        session(['captcha_answer' => $answer]);

        return response()->json([
            'question' => "{$num1} {$operator} {$num2} = ?",
        ]);
    }
}
