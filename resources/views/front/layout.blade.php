<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/front/css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/thesaas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/front/img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('assets/front/img/favicon.png') }}">
</head>

<body>


    <!-- Topbar -->
    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
        <div class="container">

            <div class="topbar-left">
                <button class="topbar-toggler">&#9776;</button>
                <a class="topbar-brand" href="{{url('/')}}">
                    <img class="logo-default" src="{{ asset('assets/front/img/logo.png') }}" alt="logo">
                    <h3>EraaSoft Blog</h3>
                </a>
            </div>


            <div class="topbar-right">
                <ul class="topbar-nav nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Category <i class="fa fa-caret-down"></i></a>
                        <div class="nav-submenu">
                            <a class="nav-link active" href="{{url('/')}}">All Categories</a>
                            @foreach ($Categories as $Category)
                                <a class="nav-link" href="{{url("/")."?category_id=".$Category->id}}">{{$Category->name}}</a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Author <i class="fa fa-caret-down"></i></a>
                        <div class="nav-submenu">
                            <a class="nav-link" href="shop-list.html">Author List</a>
                            @if (!auth()->check())
                                <a class="nav-link " href="{{url('login')}}">Author Login</a>
                                <a class="nav-link" href="shop-single.html">Register as Author</a>
                            @else
                                <a class="nav-link" href="{{url('dashboard/statistics')}}">Dashboard</a>
                                <a class="nav-link" href="{{url('logout')}}">Logout</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>

                </ul>
            </div>

        </div>

    </nav>
    <!-- END Topbar -->

    <!-- Header -->
    <header class="header header-inverse" style="background-color: #9ac29d">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1>Latest Blog Posts</h1>
                    <p class="fs-20 opacity-70">Read and get updated on how we progress.</p>
                </div>
            </div>
        </div>
    </header>
    <!-- END Header -->




    <!-- Main container -->
    @yield('content')
    </main>
    <!-- END Main container -->


    <!-- Scripts -->
    <script src="{{ asset('assets/front/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/thesaas.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/script.js') }}"></script>

</body>

</html>
