<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Testimonial;
use App\Models\Store;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('store')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $stores = Store::all();
        return view('admin.testimonials.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'person_name' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('testimonials', 'public');
            $validatedData['photo'] = $path;
        }

        Testimonial::create($validatedData);

        return redirect()->route('admin.testimonials.index')->with('success', 'Depoimento criado com sucesso!');
    }

    public function edit(Testimonial $testimonial)
    {
        $stores = Store::all();
        return view('admin.testimonials.edit', compact('testimonial', 'stores'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validatedData = $request->validate([
            'store_id' => 'required|exists:stores,id',
            'person_name' => 'required|string|max:255',
            'testimonial' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $path = $request->file('photo')->store('testimonials', 'public');
            $validatedData['photo'] = $path;
        }

        $testimonial->update($validatedData);

        return redirect()->route('admin.testimonials.index')->with('success', 'Depoimento atualizado com sucesso!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Depoimento excluído com sucesso!');
    }

}
