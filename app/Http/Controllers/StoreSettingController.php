<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreSettingController extends Controller
{
    public function index()
    {
        $goldPrices = StoreSettingController::all();

        return view('features.store_setting', compact('goldPrices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karat' => 'required|string|unique:gold_prices,karat',
            'price_per_gram' => 'required|numeric|min:0',
        ]);

        StoreSettingController::create($validated);

        return redirect()->back()->with('success', 'Gold price added.');
    }

    public function destroy($id)
    {
        StoreSettingController::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Gold price removed.');
    }
}
