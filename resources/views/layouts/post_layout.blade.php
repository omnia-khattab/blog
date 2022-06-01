<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('asset/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-md-5">
        <div class="container">
            <a class="navbar-brand" href="{{url('posts')}}">Laravel News</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('posts')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @if(Auth::check() && Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('posts/create')}}">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('messages')}}">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin')}}">Admins</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('messages/create')}}">Contact Us</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/logout')}}">Logout</a>
                    </li>
                    @endif
                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}">Login</a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </nav>

    <main id="" class="container">
            @yield('content')
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="{{ asset('asset/js/jquery-3.5.1.min.js') }}" ></script>
    <script src="{{ asset('asset/js/popper.min.js') }} "></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    
    @yield('script')
</body>
</html>