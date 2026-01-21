<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    // return view('home');
    return response()->json(['message' => 'This is a test route']);
});

Route::prefix('products')->group(function(){
Route::get('/', function () {
    return view('product.index');
});
Route::get('/{id?}', function (?string $id="duy 123") {
    return "id=" .$id;
})->name("add");

});
Route::fallback(function () {
    return "404 Not Found. The requested route does not exist.";
});