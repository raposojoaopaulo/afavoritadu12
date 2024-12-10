<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class AdminStoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('admin.stores.index', compact('stores'));
    }


    public function create()
    {
        return view('admin.stores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'city_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:stores',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'instagram_token' => 'nullable|string|max:500',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'tiktok_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $path;
        }

        Store::create($validatedData);

        return redirect()->route('admin.stores.index')->with('success', 'Loja criada com sucesso!');
    }

    public function edit(Store $store)
    {
        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $validatedData = $request->validate([
            'city_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:stores,slug,' . $store->id, 
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'instagram_token' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'tiktok_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validatedData['logo'] = $path;
        }

        $store->update($validatedData);

        return redirect()->route('admin.stores.index')->with('success', 'Loja atualizada com sucesso!');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('admin.stores.index')->with('success', 'Loja deletada com sucesso!');
    }
}
