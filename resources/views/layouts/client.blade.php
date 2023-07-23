<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albasith Center Foundation</title>
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
    <link rel="icon" type="image/png" href="/assets/img/logo.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @yield('css')
</head>

<body>
    <!--======= Start Preloader =======-->
    <div class="preloader">
        <img class="preloader-image" width="60" src="/assets/img/logo.jpeg" alt="preloader" />
    </div> <!-- /.preloader -->
    <!--======= End Preloader =======-->
    <!--====== Start Search From ======-->
    <!-- <div class="modal fade" id="search-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="form_group">
                        <input type="text" class="form_control" placeholder="Search here...">
                        <button class="search_btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>  -->
    <!--======= End Search Form =======-->
    <!--====== Start Header Area ======-->
    <header class="header-area header-v6">
        <div class="header-navigation">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Brand Logo -->
                    <div class="col-xl-2 col-sm-5 col-5">
                        <div class="brand-logo">
                            <a href="index.html">
                                <h5 class="logo-v1">Albasith Center</h5>
                                <h5 class="logo-v2">Albasith Center</h5>
                            </a>
                        </div>
                    </div>
                    <!-- Desktop and Mobile Menu -->
                    <div class="col-xl-6 col-sm-1 col-2">
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
                                        <li class="menu-item">
                                            <a href="{{ route('books') }}" class="nav-link @if(Route::is('books')) active @endif">Buku</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ route('journals') }}" class="nav-link @if(Route::is('journals')) active @endif">Jurnal</a>
                                        </li>
                                        {{-- <li class="menu-item">
                                            <a href="#About" class="nav-link">About</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#Contact" class="nav-link">Contact</a>
                                        </li> --}}
                                        <li class="menu-item menu-item-has-children">
                                            <a href="#" class="nav-link">Kategori</a>
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
    @yield('content')
    <!--====== Start Footer Area ======-->
    <footer class="footer-area footer-area-v4 bg-dark-blue">
        <div class="container">
            <div class="footer-area-internal">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="single-footer-widget footer-text-widget">
                            <h5 class="widget-title">Albasith Center Foundation</h5>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="single-footer-widget footer-text-widget">
                            <h5 class="widget-title">About Albasith Center Foundation</h5>
                            <p>Forum Publikasi Karya Ilmiah  & Penelitian</p>
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="https://www.facebook.com/groups/377489527863338/?ref=share"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/albasith_center"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://t.me/+v1zCDFBmCiNlYTll"><i class="fa-brands fa-telegram"></i></i></a></li>
                                    <li><a href="https://instagram.com/albasith.center"><i class="fab fa-instagram"></i></a></li>
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
                                    <li><a href="/books">Buku</a></li>
                                    <li><a href="/journals">Journal</a></li>
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
                                    <li><a href="#"><i class="fal fa-map-marker-alt"></i> 55 Old Broad Street, London,
                                            EC2M</a></li>
                                    <li><a href="mailto:support@gmail.com"><i class="fal fa-envelope-open-text"></i>
                                            support@gmail.com</a></li>
                                    <li><a href="tel:+01234567899"><i class="fal fa-phone"></i> +012 (345) 678 99</a>
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
                        <div class="footer-copyright text-center">
                            <p>&copy; 2021 <a href="#">Albasith Foundation.</a> All Rights Reserved</p>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.footer-copyright-area -->
    </footer> <!-- /.footer-area -->
    <!--====== End Footer Area ======-->
    <!--======= Scroll To Top =======-->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top bg-clear-blue"><i
            class="fa fa-angle-up"></i></a>
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
