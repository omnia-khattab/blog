@extends('layouts/post_layout')
@section('title')
All Posts
@endsection

@section('content')
@if(!empty($posts ))
@foreach($posts as $post)
<div class="row">
    <div class="col-md-8">
        <div class="home">
            <div class="post p-4 my-4 ">

                <div class="w-50 mb-5">
                    <img src="{{asset($post->image)}}" alt="" class="w-100">
                </div>

                <a href="{{url('/posts/details',$post->id)}}">
                    <h3>{{$post->title}}</h3>
                </a>
                <p>
                    {{ substr(strip_tags($post->content), 0, 100)}}{{strlen(strip_tags($post->content))>100 ? "..." :""}}
                </p>
                <a href="{{url('/posts/details',$post->id)}}">
                    <Button class="btn btn-primary">See More</Button>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
    </div>
</div>



@endforeach
@endif
@endsection

