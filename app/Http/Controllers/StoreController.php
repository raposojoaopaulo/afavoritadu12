<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\GalleryImage;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('pages.home', compact('stores'));
    }

    public function selectStore(Request $request)
    {
        $slug = $request->input('store_slug');

        $store = Store::where('slug', $slug)->first();
        if (!$store) {
            return redirect()->back()->with('error', 'Loja não encontrada.');
        }

        return redirect()->route('store.show', ['slug' => $slug]);
    }

    // public function show($slug)
    // {
    //     $store = Store::where('slug', $slug)->first();
    //     $galleryImages = GalleryImage::orderBy('order')->get();
    //     return view('store.show', compact('store', 'galleryImages'));
    // }

    public function show($slug)
    {
        $store = Store::where('slug', $slug)->first();

        $galleryImages = GalleryImage::orderBy('order')->get();

        $instagramPosts = $this->fetchInstagramPosts($store->id);

        $testimonials = $store->testimonials;

        return view('store.show', compact('store', 'galleryImages', 'instagramPosts', 'testimonials'));
    }

    private function fetchInstagramPosts($storeId)
    {
        $store = Store::findOrFail($storeId);

        $accessToken = $store->instagram_token;

        if (!$accessToken) {
            return [];
        }

        $client = new Client();

        try {
            $response = $client->request('GET', 'https://graph.instagram.com/me/media', [
                'query' => [
                    'fields' => 'id,media_type,media_url,thumbnail_url,permalink',
                    'access_token' => $accessToken,
                    'limit' => 4,
                ],
            ]);

            $media = json_decode($response->getBody(), true);

            // dd($media);

            return $media['data'] ?? [];
        } catch (RequestException $e) {
            return [];
        }
    }
}
