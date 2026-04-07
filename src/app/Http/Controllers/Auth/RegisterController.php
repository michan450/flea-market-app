<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
     public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ],[
            'name.required' => 'ユーザー名を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メール形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードが一致しません',
            'email.unique' => 'このメールアドレスはすでに登録されています',
        ]);

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        
        auth()->login($user);
        return redirect()->route('profile.edit');

    }
}
