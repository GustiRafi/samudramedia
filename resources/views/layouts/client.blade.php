<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samudra Media Nusantara</title>
    <!--====== Bootstrap ======-->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!--====== Font Awesome ======-->
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/all.min.css">
    <!--====== Flaticon ======-->
    <link rel="stylesheet" href="/assets/fonts/flaticon/flaticon.css">
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
    <!--====== Slick Slider ======-->
    <link rel="stylesheet" href="/assets/css/slick.css">
    <!--====== Nice Select  ======-->
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="/assets/css/default.css">
    <!--====== Main Stylesheet ======-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!--====== Responsive Stylesheet ======-->
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!-- Place favicon in the root directory -->
    <link rel="icon" type="image/png" href="/assets/img/samudralogo2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @yield('css')
</head>

<body>
    <!--======= Start Preloader =======-->
    <div class="preloader">
        <img class="preloader-image" width="100" src="/assets/img/samudralogo.png" alt="preloader" />
    </div> <!-- /.preloader -->
    <!--======= End Preloader =======-->
    <!--======= End Search Form =======-->
    <!--====== Start Header Area ======-->
    <header class="header-area header-v2">
        <div class="header-navigation">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Brand Logo -->
                    <div class="col-xl-3 col-sm-5 col-5">
                        <div class="brand-logo">
                            <a href="/">
                                <img src="/assets/img/samudralogo4.png" height="50px" alt="logo v1" class="logo-v1 w-50">
                                <img src="/assets/img/samudralogo3.png" height="50px" alt="logo v2" class="logo-v2  w-50">
                            </a>
                        </div>
                    </div>
                    <!-- Desktop and Mobile Menu -->
                    <div class="col-xl-7 col-sm-1 col-2">
                        <div class="primary-menu">
                            <div class="nav-menu">
                                <!-- Navbar Close Icon -->
                                <div class="navbar-close">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>
                                <nav class="main-menu">
                                    <ul>
                                        <li class="menu-item">
                                            <a href="{{ route('index' ) }}" class="nav-link @if(Route::is('index')) active @endif">Home</a>
                                        </li>
                                        <li class="menu-item menu-item-has-children">
                                            <a href="#" class="nav-link">Service</a>
                                            <ul class="sub-menu">
                                                @foreach (App\Models\service::orderBy('id','desc')->get() as $item)
                                                <li><a href="{{ route('service',$item->slug ) }}" class="nav-link @if(Route::is('service',$item->slug)) active @endif">{{$item->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children">
                                            <a href="#" class="nav-link">Product</a>
                                            <ul class="sub-menu">
                                                @foreach (App\Models\product::orderBy('id','desc')->get() as $item)
                                                <li><a href="{{ route('product',$item->slug ) }}" class="nav-link @if(Route::is('product',$item->slug)) active @endif">{{$item->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('books') }}" class="nav-link @if(Route::is('books')) active @endif">Books</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('journals') }}" class="nav-link @if(Route::is('journals')) active @endif">Journals</a>
                                        </li>
                                        {{-- <li class="menu-item">
                                            <a href="#About" class="nav-link">About</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#Contact" class="nav-link">Contact</a>
                                        </li> --}}
                                        <li class="menu-item menu-item-has-children">
                                            <a href="#" class="nav-link">Categories</a>
                                            <ul class="sub-menu">
                                                @foreach (App\Models\category::orderBy('id','desc')->get() as $item)
                                                <li><a href="{{ route('category',$item->slug ) }}" class="nav-link @if(Route::is('category',$item->slug)) active @endif">{{$item->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-5">
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="menu-toggle">
                                        <div class="menu-overlay"></div>
                                        <div class="nav-toggle">
                                            <div class="navbar-toggler float-end">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /.header-navigation -->
    </header> <!-- /.header-area -->
    <!--====== End Header Area ======-->
    <section class="hero-area hero-v2 bg-contain bg-clear-blue hero-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <div class="section-title section-title-white">
                            @yield('jumbotron')
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="blob-image-wrapper">
                        <div class="blob-shape-wrapper">
                            <img src="/assets/img/particle/thumbs-up-particle-white.png" alt="white thumbs up"
                                class="blob-shape blob-shape-1 animate-float-bob-y">
                            <img src="/assets/img/particle/announcement-particle-white.png" alt="white announcement"
                                class="blob-shape blob-shape-2 animate-float-bob-x">
                            <img src="/assets/img/particle/paper-plane-particle-white.png" alt="white paper plane"
                                class="blob-shape blob-shape-3 animate-float-bob-x">
                        </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- .container -->
    </section> <!-- /.hero-area -->
    @yield('content')
    <!--====== Start Footer Area ======-->
    <footer class="footer-area footer-area-v4 bg-clear-blue">
        <div class="container">
            <div class="footer-area-internal">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="single-footer-widget footer-text-widget">
                            <div class="footer-logo">
                                <img src="/assets/img/samudralogo.png" alt="footer logo white">
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="single-footer-widget footer-text-widget">
                            <h5 class="widget-title">Tentang Samudra Media Nusantara</h5>
                            <p class="text-white">Forum Publikasi Karya Ilmiah  & Penelitian</p>
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="https://www.facebook.com/groups/377489527863338/?ref=share"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/albasith_center"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://t.me/+v1zCDFBmCiNlYTll"><i class="fa-brands fa-telegram"></i></i></a></li>
                                    <li><a href="https://instagram.com/albasith.center"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://youtube.com/@al-basithcenter8748"><i class="fab fa-youtube"></i></a></li>
                                    {{-- <li><a href="#"><i class="fab fa-linkedin"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="single-footer-widget">
                            <h5 class="widget-title">Resources</h5>
                            <div class="footer-widget-menu">
                                <ul>
                                    <li><a class="text-white" href="/books">Buku</a></li>
                                    <li><a class="text-white" href="/journals">Journal</a></li>
                                    {{-- <li><a href="#Contact">Contact Us</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="single-footer-widget contact-us-widget">
                            <h5 class="widget-title">Contact Us</h5>
                            <div class="footer-widget-menu">
                                <ul>
                                    <li> <a class="text-white" href="#"><i class="fal fa-map-marker-alt text-white"></i> Bululawang, Malang, Jawa Timur, Indonesia</a></li>
                                    <li><a class="text-white" href="mailto:samuderamedianusantara@gmail.com"><i class="fal fa-envelope-open-text text-white"></i>
                                        samuderamedianusantara@gmail.com</a></li>
                                    <li><a class="text-white" href="tel:082134403154"><i class="fal fa-phone text-white"></i> 082134403154</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div><!-- /.footer-area-internal -->
        </div> <!-- /.container -->
        <div class="footer-copyright-area wow fadeInDown" data-wow-delay="0.8s">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="footer-copyright text-center text-white">
                            <p class="text-white">&copy; 2023 <a href="#" class="text-white">Samudra Media Nusantara.</a> All Rights Reserved</p>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.footer-copyright-area -->
    </footer> <!-- /.footer-area -->
    <!--====== End Footer Area ======-->
    <!--======= Scroll To Top =======-->
    <a href="http://wa.me/{{ env('ADMIN_WHATSAPP') }}" target="_blank" class="scroll-to-top bg-success"><h2><i
            class="fa-brands fa-whatsapp text-white my-2"></i></h2></a>
    <!--====== Optional Javascript ======-->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <!--====== Popper JS ======-->
    <script src="/assets/js/popper.min.js"></script>
    <!--====== Bootstrap JS ======-->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!--====== Slick Slider JS ======-->
    <script src="/assets/js/slick.min.js"></script>
    <!--====== Wow JS ======-->
    <script src="/assets/js/wow.js"></script>
    <!--====== Nice Select ======-->
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <!--====== Counter Up JS ======-->
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <!--====== Magnific Popup JS ======-->
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <!--====== Waypoint JS ======-->
    <script src="/assets/js/jquery.waypoints.js"></script>
    <!--====== Main Script ======-->
    <script src="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
