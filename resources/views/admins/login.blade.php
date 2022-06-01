@extends('layouts/post_layout')

@section('title')
Login
@endsection



@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger w-50 m-auto">{{$error}}</div>
@endforeach
@endif
<div class="form shadow p-4 my-3">
    <h4 class="text-center">Login</h4>
    <form action="{{url('/admin/handleLogin')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="checkbox" id="checkbox"> Show Password
        <button type="submit" class="btn btn-primary  d-block w-25 m-auto">Login</button>
    </form>
</div>

@endsection

@section('script')
<script>
$(document).ready(function(){
    $('#checkbox').on('change', function(){
        $('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
    });
});
</script>
@endsection