<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Lot;
use App\Models\Products;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Products::findOrFail($productId);

        $request->validate(['bid_amount' => 'required|numeric|min:']);

        Bid::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'bid_amount' => $request->bid_amount,
        ]);

        $product->save();

        return redirect()->back()->with('success', 'ставка принята');
    }

    public function myBids()
    {
        $bids = Bid::with('product')->where('user_id', auth()->id())->get();
        return view('bids.index', compact('bids'));
    }
}
