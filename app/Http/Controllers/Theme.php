<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class Theme extends Controller
{
    public function index(){

        $blogs=Blog::paginate(1);

        return view("theme.index",compact('blogs'));


    }
    public function category($id){
        $categoryName=Category::find($id)->name;
        $blogs = Blog::where('category_id', $id)->paginate(8);
    return view("theme.category", compact('blogs','categoryName'));
    }
    public function contact(){
        return view("theme.contact");
    }
    // public function singleBlog(){
    //     return view("theme.single-blog");
    // }
    
    public function login(){
        return view("theme.login");
    }
    public function register(){
        return view("theme.register");
    }
}
