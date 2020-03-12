<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Color;
use App\Size;
use App\Type_Product;
use App\Type_Info;
use App\Product_Quantity;
use Auth;
use App\Http\Requests\ValidateForm;

class ProductController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $products = Product::paginate(12);
        $product1 = Product::all();
        return view('backend\product\HomeProduct',compact('user','products'));
    }
    public function add(){
        $user = Auth::user();
        $product = Product::all();
        $color = Color::all();
        $size = Size::all();
        $type = Type_Product::all();
        $info = Type_info::all();
        return view('backend\product\add_Product',compact('user','product','size','color','info','type'));
    }
    public function go_add(ValidateForm $req)
    {
        $add = new Product;
        $add->name = $req->name;
        $add->content = $req->content;
        $add->description = $req->description;
        $add->color_id = $req->color;
        $add->size_id = $req->size;
        $add->typeProduct_id = $req->type;
        $add->typeInfo_id = $req->info;
        $add->price_unit = $req->price_unit;
        $add->price_promotion = $req->price_promotion;
        $add->image1 = 'now';
        $add->image2 = 'now';
        $add->image3 = 'now';
        $add->title = 'fasdf'; // tạo biến toàn cục
        $add->quantity = $req->quantity;
        $add->save();
        $product2 = Product::where('name','==',$req->name)->first();
        $quantity = new Product_Quantity;
        $quantity->product_id = $product2->id;
        $quantity->color_id = $req->color_id;
        $quantity->size_id = $req->size_id;
        $quantity->quantity = $req->quantity;
        return redirect(route('home'));
    }
    public function edit(){
        $user = Auth::user();
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $color = Color::all();
        $size = Size::all();
        $type = Type_Product::all();
        $info = Type_info::all();
        $total = 0;
        $product = Product::where('id',$id)->first();
        foreach($product->ProductQuantity as $number){
            $total += $number->quantity;
        }
        // dd($product->type);
        return view('backend\product\add_edit_Product',compact('product','color','size','total','type','info','user'));
    }
    public function delete($id)
    {
        $product = Product::where('id',$id);
        $product->delete();
        return redirect(route('home-product'));
    }
}
