@extends('frontend.master')
@section('content')
    <div class="row py-5">
        <h1 class="text-center">Add Blog</h1>
        <h3 class="text-center text-success">{{Session::get('msg')}}</h3>
        
        <form class="p-5 " action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <select name="category_id">
                <option value="" disabled>--- Select a Category ---</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

              </select>
              @error('title')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{old('title')}}">
              @error('title')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Description</label>
              <input type="text" class="form-control" name="desc"  value="{{old('desc')}}">
              @error('desc')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" accept="image/*">
              @error('image')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-warning">Add New Blog</button>
          </form>
    </div>

    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#id</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Desc</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td scope="row">{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->author}}</td>
                    <td>{{$blog->desc}}</td>
                    <td><img src="{{asset('/')}}{{$blog->image}}" alt="blog image" height="70" width="100"></td>
                    <td>{{$blog->status}}</td>
                    <td>
                        <a href="{{route('blog.edit',$blog->id)}}" class="btn  btn-sm btn-success">Edit</a>
                        <a href="{{route('blog.delete',$blog->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
@endsection