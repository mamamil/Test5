<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller

{

    public function create()
    {
        return view('product.create');
    }

    public function index()
    {
        $products = Products::where('status', 'open')->orderBy('title')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $products = Products::with('bids.user')->findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Products::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect('/')->with('success', 'лот создан');
    }

    public function close($id)
    {
        $products = Products::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $products->status = 'closed';
        $products->save();

        return redirect('/')->with('success', 'лот закрыт');
    }
}
