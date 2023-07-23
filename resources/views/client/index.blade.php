@extends('layouts.client')
@section('content')
    <!--====== Start Hero Area ======-->
    <section class="hero-area hero-v3 bg-solid-dark" style="background-image: url(/assets/img/hero/map-bg.png);"
        id="Home">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-xl-8 col-lg-9">
                        <div class="hero-content">
                            <div class="section-title section-title-white">
                                <h1 class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">Forum Publikasi Karya Ilmiah  & Penelitian</h1>
                                <div class="section-title-quote wow fadeInUp" data-wow-delay="0.5s"
                                    data-wow-duration="1500ms">
                                    {{-- <p>Sed ut perspiciatis unde omnis iste natus error voluptatem accusanti doloremque
                                        laudantium totam rem aperiam</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.hero-internal -->
        </div> <!-- /.container -->
    </section> <!-- /.hero-area -->
    <!--====== End Hero Area ======-->
    <!--====== Start Our Services Area ======-->
    <section class="our-services our-services-v3 bg-light-magnolia pt-120 pb-100" id="Service">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center mb-45">
                        <h2>Service</h2>
                        <!-- <div class="section-title-description">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium totam rem aperiam eaque</p>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($services as $item)    
                <div class="col-lg-4 mb-3">
                    <div class="card single-service-box-v3 wow fadeInUp" data-wow-delay="0.2s"
                        data-wow-duration="1500ms">
                        <div class="card-img-top">
                            <img src="{{ '/storage/services/'.$item->image }}" class="service thumbnail two" alt=""> 
                            {{-- <img src="https://www.emeraldgrouppublishing.com/sites/default/files/styles/service_page_banner_desktop/public/2019-12/SER2%20-%20FW%20Library%20open%20book.jpg?itok=ARYhFciG%201x"
                                alt="service thumbnail two"> --}}
                        </div>
                        <div class="card-body">
                            <h5 class="service-box-title">{{$item->name}}</h5>
                            <p>{{$item->headline}}</p>
                            <div class="service-box-btn my-3">
                                <a href="{{ route('service',$item->slug ) }}">Lihat Detail <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.our-services -->
    <!--====== End Our Services Area ======-->
    <!--====== Start Services Law Area ======-->
    <section class="services-law-area pb-130" id="About">
        <div class="container">
            <div class="section-title text-center mb-45">
                <h2>About</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="services-law-images content-left-spacer content-right-spacer">
                        <!-- <div class="services-law-image-relative animate-float-bob-x">
                            <img src="/assets/img/services/service-law-relative.png" alt="service law right">
                        </div> -->
                        <div class="services-law-image-main">
                            <img src="/assets/img/logo.jpeg" alt="service law main">
                        </div>
                        <!-- <div class="services-law-image-absolute animate-float-bob-y">
                            <img src="/assets/img/services/service-law-absolute.png" alt="service law left">
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="services-law-content content-left-spacer">
                        <div class="section-title section-title-clear-blue">
                            <div class="section-heading-tag">
                                <span class="single-heading-tag">Albasith Foundation</span>
                            </div>
                            <h2>Forum Publikasi Karya Ilmiah  & Penelitian</h2>
                            <div class="section-title-description mb-0">
                                <p>Sed ut perspiciatis unde omnis iste natus error voluptate accusantium doloremque
                                    laudantium, totam rem aperiam eaque ipsa quae abillo inventore.</p>
                            </div>
                            <div class="mt-22 mb-35">
                                <ul>
                                    <li>Create A Compelling Landing Page</li>
                                    <li>Baking Structured Data Into Design Process</li>
                                </ul>
                            </div>
                            <!-- <div class="section-button-wrapper">
                                <a href="about.html" class="filled-btn btn-bordered bg-clear-blue">
                                    Learn More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.services-law-area -->
    <!--====== End Services Law Area ======-->
    <!--====== Start Contact Area ======-->
    <section class="contact-area pt-130 pb-130" id="Contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact-area-content content-right-spacer">
                        <div class="info-iconic-boxes">
                            <div class="info-iconic-box wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1500ms">
                                <div class="info-icon info-icon-gradient-1">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="info-body">
                                    <h5>Lokasi</h5>
                                    <p>354 Oakridge, Camden <br> NJ 08102 - USA</p>
                                </div>
                            </div>
                            <div class="info-iconic-box wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                                <div class="info-icon info-icon-gradient-2">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="info-body">
                                    <h5>Email</h5>
                                    <p><a href="mailto:supportinfobiz@gmail.com">supportinfobiz@gmail.com</a></p>
                                    <p><a href="www.businesscon.net" target="_blank">www.businesscon.net</a></p>
                                </div>
                            </div>
                            <div class="info-iconic-box wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                                <div class="info-icon info-icon-gradient-3">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="info-body">
                                    <h5>Telepon</h5>
                                    <p><a href="tel:+01234578999">+012 (345) 678 99</a></p>
                                    <p><a href="tel:+8563214">+8563214</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form-area content-right-spacer">
                        <div class="section-title mb-40">
                            <div class="section-heading-tag">
                                <span class="single-heading-tag">Kirim Pesan Ke Kami</span>
                            </div>
                            <h2>Punya Pertanyaan ?</h2>
                        </div>
                        <div class="contact-respond">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('send.mail') }}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" id="fullName" placeholder="Full Name"
                                        name="name" required>
                                    <label for="fullName">Nama mu</label>
                                </div>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="emailAddress"
                                        placeholder="Email Address" name="email" required>
                                    <label for="emailAddress">Email</label>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="subject"
                                        placeholder="I Would Like  To Discuse" name="subject" required>
                                    <label for="subject">Subject</label>
                                </div>
                                <div class="input-group form-textarea">
                                    <textarea class="form-control" id="message" placeholder="Message"
                                        name="msg"></textarea>
                                    <label for="message">Pesan</label>
                                </div>
                                <div class="input-group">
                                    <button type="submit" class="filled-btn">Kirim Pesan <i
                                            class="fas fa-arrow-right"></i></button>
                                </div>
                            </form>
                        </div> <!-- /.contact-respond -->
                    </div> <!-- /.contact-form-area -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.contact-area -->
    <!--====== End Contact Area ======-->
@endsection