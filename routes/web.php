<?php

use App\Http\Controllers\Content\GetContentController;
use App\Http\Controllers\Content\GetCreateContentController;
use App\Http\Controllers\Content\GetShowController;
use App\Http\Controllers\Content\StoreContentController;
use App\Http\Controllers\Content\GetEditContentController;
use App\Http\Controllers\Content\UpdateContentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'content', 'as' =>'content.', 'namespace' => 'Content'], function () {
    Route::get('/', [GetContentController::class, '__invoke'])->name('index');
    Route::get('/{id}', [GetShowController::class, '__invoke'])->where(['id'=>'[0-9]+'])->name('show');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/create', [GetCreateContentController::class, '__invoke'])->name('create.index');
        Route::post('/', [StoreContentController::class, '__invoke'])->name('store');
        Route::get('/{content}/edit', [GetEditContentController::class, '__invoke'])->can('update-content', 'content')->where(['id'=>'[0-9]+'])->name('edit');
        Route::put('/{content}/update', [UpdateContentController::class, '__invoke'])->can('update-content', 'content')->name('update');
    });
});