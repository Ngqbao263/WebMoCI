<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string'
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            $user = Auth::user();

            // Nếu không phải admin thì chỉ báo lỗi
            // if ($user->role !== 'admin') {
            //     return back()->withErrors([
            //         'email' => 'Bạn không có quyền truy cập trang quản trị.',
            //     ]);
            // }

            return redirect()->route('admin.news.index');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->withInput($request->except('password'));
    }


}
