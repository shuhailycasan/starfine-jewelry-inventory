<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('media')->get();
        return view('features.products', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'karat' => 'required|string',
            'grams' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'karat' => $request->input('karat'),
            'grams' => $request->input('grams'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description') ?? '',
        ]);

        if ($request->hasFile('photo')) {
            $product
                ->addMediaFromRequest('photo')
                ->toMediaCollection('product_photos');
        }

        return redirect()->route('features.products')->with('success', 'Product created!');
    }

    public function update(){

    }

    public function destroy(){

}
}
