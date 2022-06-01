@extends('layouts/post_layout')
@section('title')
All Admins
@endsection

@section('content')
<a class="btn btn-primary d-block w-25 m-auto" href="{{url('admin/create')}}">Add new Admin</a>
@foreach($admins as $admin)
<div class="post p-4 my-4 ">
    <h4>{{$admin->username}}</h4>
    <h4>{{$admin->email}}</h4>
    <div>
        <a href="{{url('admin/edit',$admin->id)}}" class="btn btn-primary">Edit</a>
        @if(Auth::user()->email=='omnia@gmail.com')
        <a href="{{url('admin/delete',$admin->id)}}" class="btn btn-danger">Delete</a>
        @endif
    </div>
    
</div>

@endforeach
@endsection

