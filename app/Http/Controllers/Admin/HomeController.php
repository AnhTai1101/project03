<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use App\Http\Requests\LoginRequest;

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
    public function PostLogin(LoginRequest $req){
        $email = $req->email;
        $password = $req->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect(route('trangchu'));
        }else {
            return redirect()->back()->with('thatbai','Tài khoản hoặc mật khẩu không chính xác.');
        }
    }
}
