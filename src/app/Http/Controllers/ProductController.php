<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $items = Item::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        })->get();

        return view('items.index', compact('items'));
    }
    public function show($id)
    
    {
    $item = Item::with(['categories','comments.user.profile'])
                ->withCount(['likes', 'comments'])
                ->findOrFail($id);

    return view('items.show', compact('item'));
    }
}
