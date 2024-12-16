<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class StudViewController extends Controller
{
    public function index(){
        return "Controller!!";
    }

    public function login(){
        return view('login');
    }

    public function act_login(Request $request){
        $name = $request->input('name');
        $pass = $request->input('pswd');
        
        // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
        $result = DB::table('user')->where('username', $name)->where('password', $pass)->first();
        
        // Kiểm tra nếu người dùng tồn tại
        if ($result) {
            {
                // Đăng nhập thành công, lưu thông tin vào session
                session(['username' => $name]);
        
                // Chuyển hướng đến trang cửa hàng
                return redirect()->to('/cua-hang');
            }
        } else {
            // Đăng nhập thất bại, trả lại lỗi và quay lại trang login
            return redirect()->to('/login')->withErrors('Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
}