<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminStoreController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('pages.home');
// });

Route::get('/', [StoreController::class, 'index'])->name('pages.home');

Route::post('/select-store', [StoreController::class, 'selectStore'])->name('store.select');
Route::get('/loja/{slug}', [StoreController::class, 'show'])->name('store.show');

Route::post('/loja/{slug}/contato', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/login-admin', function () {
    return view('auth.login');
})->name('login.admin');

Route::post('/login-admin', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/lojas', [AdminStoreController::class, 'index'])->name('admin.stores.index');
    Route::get('/dashboard/lojas/create', [AdminStoreController::class, 'create'])->name('admin.stores.create');
    Route::post('/dashboard/lojas', [AdminStoreController::class, 'store'])->name('admin.stores.store');
    Route::get('/dashboard/lojas/{store}/edit', [AdminStoreController::class, 'edit'])->name('admin.stores.edit');
    Route::put('/dashboard/lojas/{store}', [AdminStoreController::class, 'update'])->name('admin.stores.update');
    Route::delete('/dashboard/lojas/{store}', [AdminStoreController::class, 'destroy'])->name('admin.stores.destroy');

    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::post('gallery/order', [GalleryController::class, 'order'])->name('gallery.order');

    Route::get('testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login-admin');
})->name('logout');

require __DIR__.'/auth.php';
