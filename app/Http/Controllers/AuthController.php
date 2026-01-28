<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showLoginForm()
    {
        return view('login');
    }
    function login(Request $request)
    {
        if($request->input('name') == 'admin' && $request->input('pass') == 'password'){
            $request->session()->put('user', $request->input('name'));
            // dd(session('user'));
            return redirect('products');
        } else {
            return "Đăng nhập thất bại!";
        }
    }
    function showRegisterForm()
    {
        return view('register');
    }
    function register(Request $request){
        if($request->input('pass') == "" || $request->input('confirm-pass') == "" || $request->input('name') == ""){
            return "Vui lòng điền đầy đủ thông tin!";
        }
        if($request->input('pass') != $request->input('confirm-pass')){
            return "Mật khẩu xác nhận không khớp!";
        }
        if($request->input('pass') == $request->input('confirm-pass')){
            return redirect('login');
        }
    }
    function showAgeForm()
    {
        return view('age');
    }
    function checkAge(Request $request)
    {
        $age = $request->input('age');
        if ($age < 18) {
            return response()->json([
                'message' => 'Access denied. You must be at least 18 years old to access this resource.',
                'age' => $age
            ], 403);
        } else {
            session()->put('age', $age);
            return redirect('products');
        }
    }
}
