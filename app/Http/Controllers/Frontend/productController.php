<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Type_product;
use App\Type_info;
use App\color;
use App\size;

class productController extends Controller
{
    public function detail($id)
    {
        $color = color::all();
        $size = size::all();
        $product = Product::where('id',$id)->first();
        return view('frontend/product.detail',compact('product','size','color'));
    }
}
