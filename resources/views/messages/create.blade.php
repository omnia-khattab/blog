@extends('layouts/post_layout')

@section('title')
Contact Us
@endsection



@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger w-50 m-auto">{{$error}}</div>
@endforeach
@endif

<div class="form shadow p-4 my-3">
    <h4 class="text-center">Contact Us</h4>
    <form action="{{url('messages/send')}}" method="post">
        @csrf
        <div class="form-group">
            <label>name</label>
            <input type="text" value="{{old('name')}}" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>email</label>
            <input type="email"  value="{{old('email')}}" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>phone</label>
            <input type="phone"  value="{{old('phone')}}" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>message</label>
            <textarea name="message" cols="30" rows="10" class="form-control">{{old('message')}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary d-block w-25 m-auto">Send</button>
    </form>
</div>


@endsection