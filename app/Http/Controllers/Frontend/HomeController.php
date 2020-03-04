<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slide;

class HomeController extends Controller
{
    public function home(){
        $slide = slide::all();
        return view('frontend\home.home',compact('slide'));
    }
}
