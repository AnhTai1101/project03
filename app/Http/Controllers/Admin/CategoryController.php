<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use App\Type_product;


class CategoryController extends Controller
{
    public function home()

    {
        $types = Type_Product::paginate(10);
        $user = Auth::user();
        return view('backend\Category\HomeCategory',compact('user','types'));
    }
    public function go_add(Request $req)
    {
        $type = new Type_product;
        $type->name = $req->name;
        $type->title = $req->title;
        $type->description = 'Nill';
        $type->image = 'tai.jpg';
        $type->save();
        return redirect(route('home-category'));
    }
    // -- end add category
    //--
    //-- edit category
    public function edit($id)
    {
        dd($id);
        $user = Auth::user();
        $type = Type_product::where('id',$id)->first();
        return view('backend\Category\edit_category',compact('user','type'));
    }
    public function go_edit(Request $req){
        // dd($req);
        $type = Type_product::where('id',$req->id)->first();
        $type->name = $req->name;
        $type->title = $req->title;
        $type->save();
        return redirect(route('home-category'));
    }

    public function add()
    {
        return view('backend\Category\add_category');
    }
    // -- 
    // delete category
    public function delete($id)
    {
        $type = Type_product::where('id',$id)->first()->delete();
        return redirect(route('home-category'));
    }
}
