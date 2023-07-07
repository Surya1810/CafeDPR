<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $spesial = Menu::where([['status', 'online'], ['kategori', 'Special']])->get();
    $makanan = Menu::where([['status', 'online'], ['kategori', 'Makanan']])->get();
    $minuman = Menu::where([['status', 'online'], ['kategori', 'Minuman']])->get();

    return view('frontend.home', compact('makanan', 'minuman', 'spesial'));
})->name('home');

Route::get('/meja/{meja}', [OrderController::class, 'index'])->name('meja');

//keranjang
Route::post('/cart', [OrderController::class, 'cart_store'])->name('cart.store');
Route::post('/cart/remove', [OrderController::class, 'cart_remove'])->name('cart.remove');
Route::post('/cart/update', [OrderController::class, 'cart_update'])->name('cart.update');
//Bayar
Route::post('/bayar', [OrderController::class, 'bayar'])->name('bayar');


Route::prefix('dashboard')->group(function () {
    //Landing
    Route::get('/', function () {
        return view('backend.index');
    })->name('dashboard');
    // Menu
    Route::resource('menu', MenuController::class);
    Route::delete('/menu/habis/{id}', [MenuController::class, 'habis'])->name('menu.habis');
    // Order
    Route::get('/order', [OrderController::class, 'dashboard'])->name('order.index');
    Route::post('/order/show/{id}', [OrderController::class, 'show'])->name('order.show');
});
