<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slide;
use App\Product;
use App\Role;

class HomeController extends Controller
{
    public function home(){
        $slide = slide::all();
        return view('frontend\home.home',compact('slide'));
    }
    public function test()
    {
        $roles = Role::all();
        foreach($roles as $role)
        {
            echo 'Cac quyen cua';
            echo $role->name;
            echo 'la <br>';
            foreach($role->action as $action){
                echo $action->name.',';
            }
        }
    }
}
