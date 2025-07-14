@extends('frontend.master')
@section('content')
    <div class="row py-5">
        <h1 class="text-center">Edit Blog</h1>
        
        <form class="p-5 bg-primary" action="{{route('blog.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$blog->id}}">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{$blog->title}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Description</label>
              <input type="text" class="form-control" name="desc"  value="{{$blog->desc}}">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" accept="image/*">
              <img src="{{asset('/')}}{{$blog->image}}" alt="blog image" height="70" width="100">
            </div>
            <button type="submit" class="btn btn-warning">Update Blog</button>
          </form>
    </div>
@endsection