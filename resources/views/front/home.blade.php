@extends('front/layout')
@section('title' , 'EraaSoft Blog | Blog')
@section('content')
    <!-- Main container -->
    <main class="main-content">
      <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Basic cards
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
      <section class="section bg-gray">
          <div class="container">

            <div class="row gap-y">
              @foreach ($Articles as $Article)
                  <div class="col-12 col-md-6 col-lg-4">
                      <div class="card card-hover-shadow">
                          <a href="{{url('post').'/'.$Article->id}}" ><img class="card-img-top" src="{{url($Article->cover_image)}}"
                                  alt="Card image cap"></a>
                          <div class="card-block">
                              <h4 class="card-title">{{$Article->title}}</h4>
                              <p class="card-text">
                                {{$Article->abstract}}
                                </p>
                              <a class="fw-600 fs-12" href="blog-single.html">Read more <i
                                      class="fa fa-chevron-right fs-9 pl-8"></i></a>
                          </div>
                      </div>
                  </div>
              @endforeach
            </div>

              <nav class="flexbox mt-30">
                  <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                  <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
              </nav>

          </div>
      </section>
  </main>

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

  <!-- END Main container -->
@endsection