<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::paginate(10);
        return view('backend.home',compact('products'));
    }
    public function logout()
    {
        echo 'logout';
    }
    public function login()
    {
        return view('backend.login');
    }
    public function PostLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Phải đúng định dạng email',
                'password.required'=>'Không được để trống mật khẩu!',
                'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
                'password.max'=>'Mật khẩu bé hơn 20 ký tự'
            ]
        );
        $user = array([
            'email'=>$red->email,
            'password'=>$req->password
        ]);
        if(Auth::attempt($user)){
            return redirect()->back()->with('thongbao', 'Đăng nhập thành công.');
        }
        else{
            return redirect()->back()->with('thongbao', 'Đăng nhập thất bại!');
        }
    }
}
