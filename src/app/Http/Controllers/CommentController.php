<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $itemId)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $itemId,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
