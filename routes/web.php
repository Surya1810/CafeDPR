<?php

use App\Http\Controllers\MenuController;
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
    $menu = Menu::where('status', 'online')->get();

    return view('frontend.home', compact('menu'));
})->name('home');

// Route::prefix('dashboard')->middleware('auth')->group(function () {
Route::prefix('dashboard')->group(function () {
    //Landing
    Route::get('/', function () {
        return view('backend.index');
    })->name('dashboard');
    // Menu
    Route::resource('menu', MenuController::class);
    Route::delete('/menu/habis/{id}', [MenuController::class, 'habis'])->name('menu.habis');
});
