<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('mypage.profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();

        $data = [
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ];

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('avatars', 'public');
            $data['profile_image'] = $path;
        }

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        $user->name = $request->name;
        $user->save();

        return redirect()->route('items.index')->with('success', '更新しました');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $data = [
        'postal_code' => $request->postal_code,
        'address' => $request->address,
        'building' => $request->building,
         ];

        $profile = new Profile();

        $profile->user_id = Auth::id(); 
        $profile->postal_code = $request->postal_code;
        $profile->address = $request->address;
        $profile->building = $request->building;

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('avatars', 'public');
            $profile->profile_image = $path; 
        }

        Profile::updateOrCreate(
        ['user_id' => Auth::id()], 
        $data       
        );

        $profile->save();

        $user = Auth::user();
        $user->name = $request->name;
        $user->save(); 

        return redirect()->route('items.index');
    }
    
}