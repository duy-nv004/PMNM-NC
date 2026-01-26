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
}
