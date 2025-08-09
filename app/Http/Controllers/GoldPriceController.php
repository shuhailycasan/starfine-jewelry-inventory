<?php

namespace App\Http\Controllers;

use App\Models\GoldPrice;
use Illuminate\Http\Request;

class GoldPriceController extends Controller
{
    public function index()
    {
        $goldPrices = GoldPrice::all();

        return view('features.gold_price', compact('goldPrices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karat' => 'required|string|unique:gold_prices,karat',
            'price_per_gram' => 'required|numeric|min:0',
        ]);

        GoldPrice::create($validated);

        return redirect()->back()->with('success', 'Gold price added.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karat' => 'required|string',
            'price_per_gram' => 'required|numeric',
        ]);

        $goldPrice = GoldPrice::findOrFail($id);
        $goldPrice->update([
            'karat' => $request->karat,
            'price_per_gram' => $request->price_per_gram,
        ]);

        return redirect()->back()->with('success', 'Gold price updated successfully.');
    }


    public function destroy($id)
    {
        GoldPrice::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Gold price removed.');
    }
}
