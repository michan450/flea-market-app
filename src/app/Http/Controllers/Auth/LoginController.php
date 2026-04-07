<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ログイン画面表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
        ], [
        'email.required' => 'メールアドレスを入力してください',
        'password.required' => 'パスワードを入力してください',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('items.index');
    }

        return back()->withErrors([
        'email' => 'ログイン情報が登録されていません',
    ])->withInput($request->only('email'));
}

    
}