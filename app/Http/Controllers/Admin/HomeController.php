<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use App\Http\Requests\LoginRequest;
use App\Product_Quantity;
use App\Users;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $products = Product::paginate(10);
        $total = 0;
        $product = Product::all();
        foreach($product as $product1){
            foreach($product1->ProductQuantity as $number){
                $total += $number->quantity;
            }
        }
        return view('backend.home',compact('products','total','user'));
    }
    public function logout()
    {
       Auth::logout();
       return redirect(route('home'));
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
