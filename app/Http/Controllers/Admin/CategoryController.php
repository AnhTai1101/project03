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
    public function add()
    {
        return view('backend\Category\add_category');
    }
}
