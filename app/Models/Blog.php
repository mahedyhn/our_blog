<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected static $path = 'blog-images/';

    public static function store($r){
        $r->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required | image'
        ],[
            'title.required' => 'Sir Pls Fill This form first',
            'title.min' => 'Sir Pls fill atleast 10 word !',
            'title.max' => 'Sir Pls fill less than 20 word !',
            'desc.required' => 'Are pagol Eta fill Kor age !',
        ]);
        
        $blog = new Blog();
        $blog->category_id = $r->category_id;
        $blog->title = $r->title;
        $blog->desc = $r->desc;
        $blog->author = auth()->user()->name;
        $imgName = 'blog-image'.time().'.'.$r->image->getClientOriginalExtension();
        $r->image->move(public_path(self::$path),$imgName);
        $blog->image = self::$path.$imgName;
        $blog->save();
    }

    public static function blogUpdate($r){

        $blog = Blog::find($r->id);
        $blog->title = $r->title;
        $blog->desc = $r->desc;
        if ($r->image) {
            if(file_exists($blog->image)){
                unlink($blog->image);
            }
            $imgName = 'blog-image'.time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move(public_path(self::$path),$imgName);
            $blog->image = self::$path.$imgName;
        }
        $blog->save();
    }


}
