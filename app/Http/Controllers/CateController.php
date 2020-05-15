<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function show($id)
    {
            $cate = Category::find($id);
            $posts = $cate->post;
        $categories = Category::all();
            return view('category',compact('cate','posts','categories'));
    }
}
