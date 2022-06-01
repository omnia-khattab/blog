@extends('layouts/post_layout')
@section('title')
All Messages
@endsection

@section('content')
@foreach($messages as $message)
<div class="post p-4 my-4 ">
    <h4>{{$message->name}}</h4>
    <h4>{{$message->phone}}</h4>
    <h4>{{$message->email}}</h4>
    <h4>{{$message->message}}</h4>
    <a href="{{url('messages/delete',$message->id)}}" class="btn btn-danger">Delete</a>
</div>

@endforeach
@endsection

