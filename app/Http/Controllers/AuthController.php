<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        // Lấy dữ liệu từ 
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('products');
        }

        dd('Đăng nhập thất bại. Vui lòng kiểm tra lại email và mật khẩu.');
    }

    function showRegisterForm()
    {
        return view('register');
    }
    function register(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
        $ure = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        // return redirect('login');
        return redirect()->route('login')->with('success', 'Đăng ký thành công, mời bạn đăng nhập!');

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
