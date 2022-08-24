<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;





Route::get('/', [ProjectController::class,'index']);

Route::get('/product',[ProjectController::class,'product'])->name('product');

Route::get('/contact',[ContactController::class,'contact'])->name('contact');

Route::get('/single_products', function () {
    return view('single_products');
});
Route::get('/about_us', function () {
    return view('about_us');
});

Route::get('/single_products/{id}',[ProjectController::class,'single_products'])->name('single_products');


Route::get('/card',[CardController::class,'card'])->name('card');

Route::post('/add_to_card',[CardController::class,'add_to_card'])->name('add_to_card');
Route::get('/add_to_card', function () {
    return redirect('/');

});

Route::post('/remove_from_card',[CardController::class,'remove_from_card'])->name('remove_from_card');
Route::get('/remove_from_card', function () {
    return redirect('/');

});

Route::post('/edit_product_quantity',[CardController::class,'edit_product_quantity'])->name('edit_product_quantity');
Route::get('/edit_product_quantity', function () {
    return redirect('/');

});

Route::get('/checkout',[CardController::class,'checkout'])->name('checkout');

Route::post('/place_order',[CardController::class,'place_order'])->name('place_order');

Route::get('/payment',[PaymentController::class,'payment'])->name('payment');



