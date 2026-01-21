<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    // return view('home');
    return response()->json(['message' => 'This is a test route']);
});

Route::prefix('products')->group(function () {
    Route::get('/add', function () {
        return view('product.add');
    })->name("add");
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index']);

    Route::get('/{id?}', function (?string $id = "123") {
        return "id=" . $id;
    });

});
Route::get('SinhVien/{name?}/{mssv?}', function (?string $name = "Luong Xuan Hieu", ?string $mssv = "123456") {
    return "Tên: " . $name . ", MSSV: " . $mssv;
});
Route::get('banco/{n?}', function (?string $n = "8") {
    return view('banco', compact('n'));
});
Route::fallback(function () {
    return view('errors.404error');
    // return "404 Not Found. The requested route does not exist.";
});