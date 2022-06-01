@extends('layouts/post_layout')

@section('title')
Edit 
@endsection



@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger w-50 m-auto">{{$error}}</div>
@endforeach
@endif

<div class="form shadow p-4 my-3">
    <h4 class="text-center">Edit Admin</h4>
    <form action="{{url('admin/update',$admin->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label>UserName</label>
            <input type="text" value="{{$admin->username}}" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email"  value="{{$admin->email}}" name="email" class="form-control">
        </div>
        <!--<div class="form-group">
            <label>Password</label>
            <input type="password"  value="{{old('password')}}" name="password" class="form-control">
        </div>-->
        <button type="submit" class="btn btn-primary  d-block w-25 m-auto">Edit Admin</button>
    </form>
</div>


@endsection