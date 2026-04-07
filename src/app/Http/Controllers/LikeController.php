<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeController extends Controller
{
    public function toggle(Item $item)
{
    $user = Auth::user();

    $like = Like::where('user_id', $user->id)
                ->where('item_id', $item->id)
                ->first();

    if ($like) {
        $like->delete(); 
    } else {
        Like::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);
    }

    return back();
}
}
