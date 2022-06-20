<?php

use App\Http\Controllers\rentalController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

    //route rental
Route::get('data-rental',[rentalController::class, 'index']);
Route::get('add-rental',[rentalController::class, 'create']) ->name('rental.add-rental');
Route::post('save-rental',[rentalcontroller::class, 'ambilData'])->name('rental.save-rental');
Route::delete('delete-rental/{id}', [rentalcontroller::class, 'destroy'])->name('delete.rental');
Route::get('edit-rental/{id}/edit', [rentalcontroller::class, 'edit'])->name('edit.rental');
//proses update
Route::put('edit-rental/{id}', [rentalcontroller::class, 'update'])->name('update.rental');


