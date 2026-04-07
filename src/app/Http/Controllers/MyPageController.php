<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $items = $user->items; 
        $purchases = $user->purchases; 

        return view('mypage', compact('user', 'items', 'purchases'));
    }
}
