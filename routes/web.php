<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [AdminController::class,'about'])->name('about');
Route::get('/blogs', [AdminController::class, 'index'])->name('blog.index');

Route::get('blog',[AdminController::class,'index'])->name('blog');
Route::get('create',[AdminController::class,'create']);
Route::post('insert',[AdminController::class,'insert']);

Route::delete('delete/{id}', [AdminController::class, 'destroy'])->name('blog.destroy');
Route::delete('change/{id}', [AdminController::class, 'change'])->name('blog.change');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('blog.edit');
Route::put('blog/{id}', [AdminController::class, 'update'])->name('blog.update');







Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
