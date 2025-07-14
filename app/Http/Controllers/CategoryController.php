<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('frontend.category.index',['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        Category::store($request);
        return back()->with('msg','Category Added Successfully!');
    }

    public function blogsByCategory($id)
    {
        $blogs = Blog::where('category_id' , $id)->latest()->take(2)->get(['id','title']);
        return $blogs;
        return view('frontend.category-blog.index',['categories' => Category::all(),'blogs'=>$blogs]);
    }
}
