<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Type_info;

class TypeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $infos = Type_info::paginate(10);
        return view('backend/Type.home',compact('user','infos'));
    }
    public function go_add(Request $req)
    {
        $info = new Type_info;
        $info->name = $req->name;
        $info->title = $req->title;
        $info->description = "null";
        $info->image = 'taj.jpg';
        $info->save();
        return redirect(route('home-type'));

    }
    public function delete($id)
    {
        Type_info::where('id',$id)->delete();
        return redirect(route('home-type'));
    }
}
