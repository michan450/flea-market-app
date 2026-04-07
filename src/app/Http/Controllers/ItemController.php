<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {

        
        if ($request->tab === 'mylist') {

            if (!Auth::check()) {
                $items = collect(); 
            } else {
                $items = Item::with('purchase')
                  ->whereHas('likes', function ($query) {
                    $query->where('user_id', Auth::id());
                })->get();
            }

        } else {

            
            $items = Item::with('purchase')->get();
        }

        return view('items.index', compact('items'));
    }

    public function toggleLike(Item $item)
    {
        $user = Auth::user();

        if ($item->isLikedBy($user)) {
            $item->likes()->where('user_id', $user->id)->delete();
        } else {
            $item->likes()->create(['user_id' => $user->id]);
        }

        return response()->json([
            'likes_count' => $item->likes()->count(),
            'liked' => $item->isLikedBy($user)
        ]);
    }

    public function create()
    {
        return view('items.sell'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'categories' => 'required|array',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'categories' => json_encode($request->categories),
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('items', 'public');
            $data['image'] = $path;
        }

        Item::create($data);

        return redirect()->route('items.index');
    }
}