@extends('frontend.master')
@section('title','Home')
@section('content')
<div class="row">
    <div class="row mb-2">
        <h1 class="text-center my-5">Category Wise Products</h1>
        @foreach ($blogs as $blog)
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">{{$blog->title}}</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">{{$blog->desc}}</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="{{asset('/')}}{{$blog->image}}"
                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" role="img"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>


</div><!-- /.row -->
@endsection