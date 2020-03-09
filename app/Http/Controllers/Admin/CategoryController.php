<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function home()
    {
        return view('backend\Category\HomeCategory');
    }
    public function add()
    {
        return view('backend\Category\add_category');
    }
}
