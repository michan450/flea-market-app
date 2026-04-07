<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function show(Item $item)
    {

        $user = Auth::user();
        return view('items.purchase', compact('item', 'user'));

        
    }
    public function store(Request $request, Item $item)
    {
        if ($item->purchase) {
            return back()->with('error', '売り切れです');
        }

        Purchase::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
        ]);

        return redirect()->route('items.index')->with('success', '購入完了！');
        
        return redirect()->route('purchase.show', $item);
    }
    public function editAddress(Item $item)
    {
    $user = Auth::user();
    return view('purchase.address', compact('item', 'user'));
    }
    public function updateAddress(Request $request, Item $item)
    {
    $user = Auth::user();

    $user->profile->update([
        'postal_code' => $request->postal_code,
        'address' => $request->address,
    ]);

    return redirect()->route('purchase.show', $item);
    }
}
