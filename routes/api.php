<?php

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/catalog', function() {
    return Product::all();
});
Route::post('/product/add', function() {
    request()->validate([
        'name' => 'required', 
        'size' => 'required', 
        'size_type' => 'required', 
        'price' => 'required', 
        'discounted_price' => 'required', 
        'image' => 'required',
    ]);
    
    return Product::create([
        'name' => request('name'), 
        'size' => request('size'), 
        'size_type' => request('size_type'), 
        'price' => request('price'), 
        'discounted_price' => request('discounted_price'), 
        'image' => request('image'),
    ]);
});
Route::put('/products/{product}', function(Product $product) {
    request()->validate([
        'name' => 'required', 
        'size' => 'required', 
        'size_type' => 'required', 
        'price' => 'required', 
        'discounted_price' => 'required', 
        'image' => 'required',
    ]);
    
    $product->update([
        'name' => request('name'), 
        'size' => request('size'), 
        'size_type' => request('size_type'), 
        'price' => request('price'), 
        'discounted_price' => request('discounted_price'), 
        'image' => request('image'),
    ]);
});