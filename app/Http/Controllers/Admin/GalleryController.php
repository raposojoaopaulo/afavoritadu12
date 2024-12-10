<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('order')->get();
        return view('admin.gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => $imagePath,
            'order' => GalleryImage::max('order') + 1,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('gallery.index')->with('success', 'Imagem adicionada com sucesso!');
    }

    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);
        // Remove o arquivo de imagem
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'Imagem removida com sucesso!');
    }

    public function order(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $index => $id) {
            GalleryImage::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

}
