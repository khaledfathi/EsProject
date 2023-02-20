<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>{{$Post->title}}</title>

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
    <header class="header header-inverse h-fullscreen pb-80"
        style="background-image: url('{{url($Post->cover_image)}}');" data-overlay="8">
        <div class="container text-center">

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <br>
                    <h1 class="display-4 hidden-sm-down">{{$Post->title}}</h1>
                    <h1 class="hidden-md-up">{{$Post->title}}</h1>
                    <br><br>
                    <p><span class="opacity-70 mr-8">By</span> <a class="text-white" href="#">{{$Author->name}}</a>
                    </p>
                    <p><img class="rounded-circle w-40" src="assets/front/img/avatar/2.jpg" alt="..."></p>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#section-content"
                        data-scrollto="section-content"><span></span></a>
                </div>

            </div>

        </div>
    </header>
    <!-- END Header -->




    <!-- Main container -->
    <main class="main-content">



        <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
        <div class="section" id="section-content">
            <div class="container">

                <br>
                <p><img src="{{url($Post->cover_image)}}" alt="..."></p>
                <br>

                <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">
                      {{$Post->content}}
                    </div>
                </div>
            </div>
        </div>





        <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
        <div class="section bt-1 bg-grey">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">

                        <div class="media-list">

                            <div class="media">
                                <img class="rounded-circle w-40" src="assets/front/img/avatar/1.jpg" alt="...">

                                <div class="media-body">
                                    <p class="fs-14">
                                        <strong>Maryam Amiri</strong>
                                        <time class="ml-16 opacity-70 fs-12" datetime="2017-07-14 20:00">24 min
                                            ago</time>
                                    </p>
                                    <p class="fs-13">Efficiently synthesize high standards in processes rather than
                                        premier models. Continually coordinate parallel schemas through turnkey
                                        deliverables. Compellingly expedite viral infrastructures.</p>
                                </div>
                            </div>



                            <div class="media">
                                <img class="rounded-circle w-40" src="assets/front/img/avatar/2.jpg" alt="...">

                                <div class="media-body">
                                    <p class="fs-14">
                                        <strong>Hossein Shams</strong>
                                        <time class="ml-16 opacity-70 fs-12" datetime="2017-07-14 20:00">6 hours
                                            ago</time>
                                    </p>
                                    <p class="fs-13">Energistically iterate cross functional best practices after.</p>
                                </div>
                            </div>



                            <div class="media">
                                <img class="rounded-circle w-40" src="assets/front/img/avatar/3.jpg" alt="...">

                                <div class="media-body">
                                    <p class="fs-14">
                                        <strong>Sarah Hanks</strong>
                                        <time class="ml-16 opacity-70 fs-12"
                                            datetime="2017-07-14 20:00">Yesterday</time>
                                    </p>
                                    <p class="fs-13">Appropriately streamline backward-compatible ideas through high
                                        standards in benefits. Intrinsicly communicate granular.</p>
                                </div>
                            </div>

                        </div>


                        <hr>


                        <form action="#" method="POST">

                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" placeholder="Name">
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <input class="form-control" type="text" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
                            </div>

                            <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>





    </main>
    <!-- END Main container -->






    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row gap-y align-items-center">
                <div class="col-12 col-lg-3">
                    <p class="text-center text-lg-left">
                        <a href="{{url('/')}}">EraaSoft Blog</a>
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <ul class="nav nav-primary nav-hero">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>

                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="social text-center text-lg-right">
                        <a class="social-facebook" href="https://www.facebook.com/"><i
                                class="fa fa-facebook"></i></a>
                        <a class="social-twitter" href="https://twitter.com/"><i
                                class="fa fa-twitter"></i></a>
                        <a class="social-instagram" href="https://www.instagram.com//"><i
                                class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->



    <!-- Scripts -->
    <script src="assets/front/js/core.min.js"></script>
    <script src="assets/front/js/thesaas.min.js"></script>
    <script src="assets/front/js/script.js"></script>

</body>

</html>
