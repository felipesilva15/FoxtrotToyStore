<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Order
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
});


// Route::get('/teste', function(){
//     $data = [];

//     foreach (Auth::user()->CartItems as $item) {
//         array_push($data, [
//             'PEDIDO_ID' => 1,
//             'PRODUTO_ID' => $item->PRODUTO_ID,
//             'ITEM_QTD' => $item->ITEM_QTD,
//             'ITEM_PRECO' => ($item->produto->PRODUTO_PRECO - $item->produto->PRODUTO_DESCONTO)
//         ]);
//     }

//     return response()->json(Auth::user()->CartItems);
// });


require __DIR__.'/auth.php';
