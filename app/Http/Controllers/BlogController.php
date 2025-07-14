<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public static $path = 'blog-images/';

    public function index()
    {
        $blogs = Blog::all();
        $categories = Category::all();

        return view('frontend.blog.index',['blogs' => $blogs,'categories'=>$categories]);
    }

    public function store(Request $r)
    {
        Blog::store($r);
        return back()->with('msg','Blog Added Successfully');
    }

    public function update(Request $r)
    {
        Blog::blogUpdate($r);
        return redirect(route('blog'))->with('msg','Blog Update Successfully');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('frontend.blog.edit',['blog' => $blog]);
    }

    public function delete($bId)
    {
        $blog = Blog::find($bId);
        if(file_exists($blog->image)){
            unlink($blog->image);
        }
        $blog->delete();
        return redirect(route('blog'))->with('msg','Blog Deleted Successfully');

    }


}
