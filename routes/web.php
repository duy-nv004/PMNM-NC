<?php

use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\testController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    // return view('home');
    return response()->json(['message' => 'This is a test route']);
});

Route::prefix('products')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/add', function () {
            return view('product.add');
        })->name("add");
        Route::get('/', 'index');

        Route::get('detail/{id?}', 'getDetail')->name('detail');
        Route::post('store', 'store')->name('store');

    });
});
Route::get('login', [AuthController::class, 'showLoginForm'])->name("login");
Route::post('login', [AuthController::class, 'login'])->name("login.post");
Route::get('register', [AuthController::class, 'showRegisterForm'])->name("register");
Route::post('register', [AuthController::class, 'register'])->name("register.post");
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
Route::resource('tests', testController::class);
Route::post('session', function (Request $request) {
    // $request->session()->put('key', 'value');
    $name = session()->all();
    return  response()->json($name);
})->name('session');
Route::get('age', [AuthController::class, 'showAgeForm'])->name('age');
Route::post('age', [AuthController::class, 'checkAge'])->name('checkAge.post');
