<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

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
}
