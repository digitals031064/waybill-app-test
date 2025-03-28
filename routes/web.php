<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\WaybillController;

Route::get('/waybills', [WaybillController::class, 'index'])->name('waybills.index');
Route::get('/waybills/fetch', [WaybillController::class, 'fetch']);
Route::post('/waybills', [WaybillController::class, 'store'])->name('waybills.store');
Route::put('/waybills/{waybill}', [WaybillController::class, 'update']);
Route::delete('/waybills/{waybill}', [WaybillController::class, 'destroy']);


require __DIR__.'/auth.php';
