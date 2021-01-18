<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>न्यूज कट्टा </title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                  <!-- <ul class="navbar-top-left-menu">
                    <li class="nav-item">
                      <a href="pages/index-inner.html" class="nav-link">Advertise</a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/aboutus.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Write for Us</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">In the Press</a>
                    </li>
                  </ul>
                  <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Sign in</a>
                    </li>
                  </ul> -->
                </div>
              </div>
              <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a class="navbar-brand" href="#"
                      ><img src="assets/images/newskatta1.png" alt=""
                    /></a>
                  </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                          </li>
                        @foreach($categories as $key=> $cat)
                        @if($key < 6 )
                        <li class="nav-item active">
                          <a class="nav-link" href="{{url("category")}}/{{$cat->slug}}">{{$cat->title}}</a>
                        </li>
                        @endif
                        @endforeach
                        <li class="nav-item">
                          <a class="nav-link" href="/allnews">All News</a>
                        </li>
                        {{--  <li class="nav-item">
                          <a class="nav-link" href="pages/magazine.html">आंतरराष्ट्रीय</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/business.html">राष्ट्रीय</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/sports.html">महाराष्ट्र</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/art.html">विदर्भ</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/politics.html">आपला जिल्हा</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pages/travel.html">राजकीय कट्टा</a>
                        </li>  --}}
                        <!-- <li class="nav-item">
                          <a class="nav-link" href="pages/contactus.html">Contact</a>
                        </li> -->
                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <!-- partial -->
        <div class="flash-news-banner">
          <div class="container">
            @foreach($latest->take(1) as $key => $l)

            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">ताज्या बातम्या</span>
                <p class="mb-0">
                  {{$l->title}}
                </p>
              </div>
              <div class="d-flex">
                <span class="mr-3 text-danger">{{$l->created_at}}</span>
                <span class="text-danger">{{$l->place}}</span>
              </div>
            </div>
            @endforeach
          </div>
        </div>
     
        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">
              
              <div class="col-xl-8 stretch-card grid-margin">
                @foreach($latest->take(1) as $key => $f)

                <div class="position-relative">
                  <img
                    src="{{url('/posts')}}/{{$f->image}}"
                    alt="banner"
                    class="img-fluid"
                    width="1450px"
                    height="820px"
                  />
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                      HEADLINES
                    </div>
                    <h1 class="mb-0" style="    margin-top: 50px;
                    ">{{$f->title}}</h1>
                    <h1 class="mb-2"  >
                {!! substr($f->description,0,300)!!}
                    </h1>
                    {{--  <div class="fs-12">
                      <span class="mr-2">Photo </span>10 Minutes ago
                    </div>  --}}
                  </div>
                </div>
                @endforeach

              </div>
              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest news</h2>
                    @foreach($latest->take(3) as $key => $l)

                    <div
                      class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">
                       <a href="{{url('article')}}/{{$l->pid}}"> <h5>{{$l->title}}</h5></a>
                        <div class="fs-12">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                      </div>
                      <div class="rotate-img">
                        <a href="{{url('article')}}/{{$l->pid}}"><img
                          src="{{url('/posts')}}/{{$l->image}}"
                          alt="thumb"
                          class="img-fluid img-lg"
                          width="190px"
                          height="144px"
                        /></a>
                      </div>
                    </div>
                    @endforeach

                    {{--  <div
                      class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">
                        <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                        <div class="fs-12">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_2.jpg"
                          alt="thumb"
                          class="img-fluid img-lg"
                        />
                      </div>
                    </div>

                    <div
                      class="d-flex pt-4 align-items-center justify-content-between"
                    >
                      <div class="pr-3">
                        <h5>Virus Kills Member Of Advising Iran’s Supreme</h5>
                        <div class="fs-12">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                      </div>
                      <div class="rotate-img">
                        <img
                          src="assets/images/dashboard/home_3.jpg"
                          alt="thumb"
                          class="img-fluid img-lg"
                        />
                      </div>
                    </div>  --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                    @foreach ( $categories as $key => $cat)
                    @if($key > 0 && $key > 5)
                      <li><a href="{{url("category")}}/{{$cat->slug}}">{{$cat->title}}</a></li>
                    @endif
                    @endforeach
                      {{--  <li><a href="#">क्रीडा कट्टा</a></li>
                      <li><a href="#">कृषि कट्टा</a></li>
                      <li><a href="#">आरोग्य कट्टा</a></li>
                      <li><a href="#">युवा कट्टा</a></li>
                      <li><a href="#">वुमनिया कट्टा</a></li>
                      <li><a href="#">वन्यजीव कट्टा</a></li>
                      <li><a href="#">सांस्कृतिक कट्टा</a></li>
                      <li><a href="#">जॉब कट्टा</a></li>
                      <li><a href="#">जाहिरात कट्टा</a></li>
                      <li><a href="#">सुगरण कट्टा</a></li>
                      <li><a href="#">टेक्नो कट्टा</a></li>
                      <li><a href="#">व्यापार कट्टा</a></li>
                      <li><a href="#">शिक्षण कट्टा</a></li>
                      <li><a href="#">थोडक्यात!</a></li>
                      <li><a href="#">HEADLINES</a></li>  --}}
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    @foreach($general->take(3) as $g)
                    <div class="row">

                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <a href="{{url('article')}}/{{$g->pid}}">
                            <img
                              src="{{url('/posts')}}/{{$g->image}}"
                              alt="thumb"
                              class="img-fluid"
                              width="502px"
                              height="340px"
                            />
                            </a>
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Maharashtra</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">

                        <h2 class="mb-2 font-weight-600">
                          <a href="{{url('article')}}/{{$g->pid}}">{{$g->title}}</a>
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">Photo </span>10 Minutes ago
                        </div>
                        <a href="{{url('article')}}/{{$g->pid}}">
                        <p class="mb-0">

                          {!! substr($g->description,0,300)!!}
                        </p>
                        </a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card-title">
                          राजकीय कट्टा
                        </div>
                        @foreach($pol->take(4) as $key => $p)

                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <a href="{{url('article')}}/{{$p->pid}}"><img
                                
                                  src="{{url('/posts')}}/{{$p->image}}"
                                  alt="thumb"
                                  class="img-fluid"
                                  width="614px"
                                  height="358px"
                                /></a>
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    >Politics</span
                                  >
                                  {{-- <div class="video-icon">
                                    <i class="mdi mdi-play"></i>
                                  </div> --}}
                                </div>
                              </div>
                            </div>
                          </div>

                          @endforeach

                        
                          
                      <div class="col-lg-4">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <div class="card-title">
                            Latest राजकीय कट्टा

                          </div>
                        </div>
                        @foreach($pol->take(3) as $key => $p)

                        <div
                          class="d-flex justify-content-between align-items-center pt-3"
                        >

                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <a href="{{url('article')}}/{{$f->pid}}"><img
                                src="{{url('/posts')}}/{{$f->image}}"
                                alt="thumb"
                                class="img-fluid"
                                width="120px"
                                height="100px"
                              /></a>
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                            {{$f->title}}
                          </h3>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6">
                        {{-- <div class="card-title">
                          थोडक्यात!
                        </div> --}}
                        <div class="row">
{{--                           
                          <div class="col-xl-6 col-lg-8 col-sm-6">
                            <div class="rotate-img">
                              <img
                                src="assets/images/dashboard/home_16.jpg"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                            <h2 class="mt-3 text-primary mb-2">
                              Newsrooms exercise..
                            </h2>
                            <p class="fs-13 mb-1 text-muted">
                              <span class="mr-2">Photo </span>10 Minutes ago
                            </p>
                            <p class="my-3 fs-15">
                              Lorem Ipsum has been the industry's standard dummy
                              text ever since the 1500s, when an unknown printer
                              took
                            </p>
                            <a href="#" class="font-weight-600 fs-16 text-dark"
                              >Read more</a
                            >
                          </div> --}}

                          @foreach($health->take(4) as $key => $f)

                          <div class="col-xl-6 col-lg-4 col-sm-6">

                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                                
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"> </span>
                              </p>
                              <a href="{{url('article')}}/{{$f->pid}}">
                              <p class="mb-0">
                                {{$f->title}}  </p>
                              </a>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="card-title">
                              थोडक्यात!
                            </div>
                            @foreach($featured->take(2) as $key => $f)

                            <div class="border-bottom pb-3">

                              <div class="rotate-img">
                                <a href="{{url('article')}}/{{$f->pid}}"><img
                                  src="{{url('/posts')}}/{{$f->image}}"
                                  alt="thumb"
                                  class="img-fluid"
                                  width="400px"
                                  height="224px"
                                />
                              </div>
                            </a>
                              <p class="fs-16 font-weight-600 mb-0 mt-3">
                                {{$f->title}}
                              </p>
                            </div>
                            @endforeach

                          </div>
                          <div class="col-sm-6">
                            <div class="card-title">
                              Most Views
                            </div>
                            @foreach($viewmost->take(4) as $key => $f)

                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <a href="{{url('article')}}/{{$g->pid}}"><img
                                          src="{{url('/posts')}}/{{$g->image}}"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                          width="148px"
                                          height="118px"
                                        /></a>
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <p class="fs-16 font-weight-600 mb-0">
                                        {!! substr($f->title,0,30)!!}                                    
                                      <p class="mb-0 fs-13">
                                        {!! substr($f->description,0,30)!!}                                    
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <img src="assets/images/logo.svg" class="footer-logo" alt="" />
                  <h5 class="font-weight-normal mt-4 mb-5">
                    Newspaper is your news, entertainment, music fashion website. We
                    provide you with the latest breaking news and videos straight from
                    the entertainment industry.
                  </h5>
                  <ul class="social-media mb-3">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="assets/images/dashboard/home_1.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2 pt-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="assets/images/dashboard/home_2.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="assets/images/dashboard/home_3.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600 mb-3">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                  <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Magazine</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Business</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Sports</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Arts</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Politics</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                      Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <script src="./assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>