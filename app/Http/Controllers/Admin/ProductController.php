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
        //Kiểm tra file
        $image1 = '';
        if ($req->hasFile('image1')) {
            $file = $req->image1;
            $image1 = time().'-'.$file->getClientOriginalName();
            $file->move('public\images',$image1);
        }
        //Kiểm tra file
        $image2 = '';
        if ($req->hasFile('image2')) {
            $file = $req->image2;
            $image2 = time().'-'.$file->getClientOriginalName();
            $file->move('public\images',$image2);
        }
        //Kiểm tra file
        $image3 = '';
        if ($req->hasFile('image3')) {
            $file = $req->image3;
            $image3 = time().'-'.$file->getClientOriginalName();
            $file->move('public\images',$image3);
        }
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
        $add->image1 = $image1;
        $add->image2 = $image2;
        $add->image3 = $image3;
        $add->title = 'fasdf'; // tạo biến toàn cục
        $add->quantity = $req->quantity;
        $add->save();
        $product2 = Product::orderBy('id','desc')->first();
        $quantity = new Product_Quantity;
        $quantity->product_id = $product2->id;
        $quantity->color_id = $req->color;
        $quantity->size_id = $req->size;
        $quantity->quantity = $req->quantity;
        $quantity->save();
        return redirect(route('trangchu'));
    }
    // edit product
    public function go_edit(ValidateForm $req)
    {
        dd($req->price_promotion);
        $edit = 0;

        //------
        $quantity = Product_Quantity::where('product_id',$req->id)->first();
        $edit = $quantity->quantity;
        $quantity->quantity = $req->quantity;
        $quantity->save();
        // ----------
        
        // phan trang
        $product_edit = Product::where('id',$req->id)->first();
        if ($req->hasFile('image1')) {
            if(file_exists($product_edit->image1)){
                unlink('public/images/'.$product_edit->image1);
            }
            $file = $req->image1;
            $product_edit->image1 =time().'_'.$file->getClientOriginalName();
            $file->move('public/images/',$product_edit->image1);
        }
        //Kiểm tra file
        if ($req->hasFile('image2')) {
            if(file_exists($product_edit->image3)){
                unlink('public/images/'.$product_edit->image2);
            }
            $file = $req->image2;
            $product_edit->image2 =time().'_'.$file->getClientOriginalName();
            $file->move('public/images/',$product_edit->image2);
        }
        //Kiểm tra file
        if ($req->hasFile('image3')) {
            if(file_exists($product_edit->image3)){
                unlink('public/images/'.$product_edit->image3);
            }
            $file = $req->image3;
            $product_edit->image3 =time().'_'.$file->getClientOriginalName();
            $file->move('public/images/',$product_edit->image3);
        }
        //------
        $product_edit->name = $req->name;
        $product_edit->content = $req->content;
        $product_edit->description = $req->description;
        // $product_edit->color_id = $req->color;
        // $product_edit->size_id = $req->size;
        // $product_edit->typeProduct_id = $req->type;
        // $product_edit->typeInfo_id = $req->info;
        $product_edit->price_unit = $req->price_unit;
        $product_edit->price_promotion = isset($req->price_promotion) ? $req->price_promotion : 0;
        $product_edit->title = 'fasdf'; // tạo biến toàn cục
        // tinh cho so luong
        $product_edit->Quantity += $req->quantity - $edit;
        $product_edit->save();
        return redirect(route('trangchu'));
    }
    // open page edit Product
    public function edit($id){
        $user = Auth::user();
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
    // delete Product
    public function delete($id)
    {
        $product = Product::where('id',$id)->first();
        // delete image
        // dd($product->image1);
        if($product->image1){
            unlink('public/images/'.$product->image1);
        }
        //delete image 
        if($product->image2){
            unlink('public/images/'.$product->image2);
        }
        // delete image 
        if($product->image3){
            unlink('public/images/'.$product->image3);
        }
        // delete database
        $product->delete();
        return redirect(route('home-product'));
    }
}
