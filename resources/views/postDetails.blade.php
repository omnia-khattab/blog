@extends('layouts/post_layout')

@section('title')
{{$post->title}}
@endsection

@section('content')

<div class="row">
    <div class="col-9 m-auto">
        <div class="post-details shadow p-4">
            <div class="d-flex justify-content-between align-items-baseline mb-3">
                <a href="{{url('posts/')}}" class="btn btn-dark">Back</a>

                @if(Auth::check() && Auth::user()->is_admin==1)
                <div>
                    <a href="{{url('posts/edit',$post->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('posts/delete',$post->id)}}" class="btn btn-danger">Delete</a>
                </div>
                @endif
                
            </div>
            @if(isset($post->image))
            <div class="text-center">
                <img src="{{asset($post->image)}}" alt="post-image" class="w-75">
            </div>
            @endif
            <h2 class="mt-3">{{$post->title}}</h2>
            <p class="text-muted">Created By : {{$post->user->username}}</p>
            <p>{!! $post->content !!}</p>
            
        </div>
    </div>
</div>

<div class="row my-5">
    <div class="col-md-10">
        <div class="comments-container">
            <h2>Comments</h2>
        </div>
    </div>
</div>

@endsection

