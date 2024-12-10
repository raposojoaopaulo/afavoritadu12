<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Models\Store;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitForm(Request $request, $slug)
    {
        if ($request->filled('website')) {
            return redirect()->back()->with('error', 'O formulário não foi enviado corretamente.');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:5',
        ]);
    
        $store = Store::where('slug', $slug)->firstOrFail();

        $validated['store_name'] = $store->city_name;
    
        Mail::to('raposojoaopaulo@gmail.com')->send(new ContactMessage($validated));
    
        return redirect()->to(route('store.show', ['slug' => $store->slug]) . '?success=true');
    }
    
}
