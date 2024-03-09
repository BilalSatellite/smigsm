<?php

use App\Livewire\Pages\Home;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\IcDatabase;
use App\Livewire\Pages\Repairing;
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

Route::get('/', Home::class)->name('/');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/repairing', Repairing::class)->name('repairing');
Route::get('/ic-database', IcDatabase::class)->name('ic-database');
// Route::get('dashboard', function () {
//     return redirect('/panel');
// })->name('dashboard');
// Route::get('filament.panel.pages.dashboard',function(){
//     filament.panel.pages.dashboard
// })
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
// Route::get('/profile', function () {
//     return redirect('/panel/my-profile');
// })->middleware(['auth'])->name('profile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/panel', function () {
    //     return redirect('/panel');
    // })->name('panel');
    Route::get('/user/profile', function () {
        return redirect('/panel/my-profile');
    });
});
