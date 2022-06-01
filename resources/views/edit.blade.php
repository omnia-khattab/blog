@extends('layouts/post_layout')

@section('title')
Edit {{$post->title}}
@endsection



@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger w-50 m-auto">{{$error}}</div>
@endforeach
@endif

<div class="form shadow p-4 my-3">
    <h4 class="text-center">Edit Post</h4>
    <form action="{{url('posts/update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Post Title</label>
            <input type="text" value="{{$post->title}}" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" cols="30" rows="15" class="form-control">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file"  name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary d-block w-25 m-auto">Edit</button>
        <!--<a href="{{url('posts/')}}" class="btn btn-warning">Cancel</a>-->
    </form>
</div>


@endsection

@section('script')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists link code codesample',
        
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table| link | codesample',
        default_link_target: '_blank'
    });
</script>

@endsection