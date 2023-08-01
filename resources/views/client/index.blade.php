@extends('layouts.client')
@section('content')
<!--====== Start Hero Area ======-->
<section class="hero-area hero-v2 bg-contain bg-ocean-blue hero-padding"
    style="background-image: url(assets/img/hero/hero-map-bg.png);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content">
                    <div class="section-title section-title-white">
                        <h2 class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">Forum <span>Publikasi
                                Karya Ilmiah & Penelitian</span></h2>
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
<!--======= End Hero Area =======-->
<!--====== Start Our Services Area ======-->
<section class="our-services our-services-v1 pt-100"
    style="background-image: url(/assets/img/services/dots-pattern-bg.png);">
    <div class="container">
        <div class="service-area-internal">
            <div class="section-particle-effect d-none d-lg-block">
                <img class="particle-1 animate-zoominout" src="/assets/img/particle/gradient-ball-shape.png"
                    alt="ball shape">
                <img class="particle-3 animate-rotate-me" src="/assets/img/particle/gradient-curve-shape.png"
                    alt="curve shape">
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title mb-105 text-center section-title-ocean-blue">
                        <div class="section-heading-tag">
                            <span class="single-heading-tag">Service Populer</span>
                        </div>
                        <h2>Kami Memiliki Profesional <br class="d-none d-md-block">
                            <span>Service</span>
                            Tersedia
                        </h2>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.service-area-internal -->
    </div> <!-- /.container -->
    <!-- /.service-area-content -->
</section> <!-- /.our-services -->
<!--====== End Our Services Area ======-->
<!--====== Start Our Services Area ======-->
<section class="our-services our-services-v3 bg-light-magnolia pb-100" id="Service">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($services as $item)
                <div class="col-lg-4 mb-2">
                    <div class="card single-service-box single-service-box-v2 wow fadeInUp" data-wow-delay="0.2s"
                        data-wow-duration="1500ms">
                        <div class="card-img-top">
                            <img src="{{ '/storage/services/'.$item->image }}"
                                class="service thumbnail two" alt="">
                        </div>
                        <div class="card-body service-box-content">
                            <h5 class="service-box-title">{{ $item->name }}</h5>
                            <p>{{ $item->headline }}</p>
                            <div class="service-box-btn my-3">
                                <a href="{{ route('service',$item->slug ) }}"><i
                                        class="fas fa-arrow-right"></i></a>
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
<section class="services-law-area pb-100" id="About">
    <div class="container">
        <div class="section-title text-center mb-45">
            <h2>About</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="services-law-images content-left-spacer content-right-spacer">
                    <div class="services-law-image-main">
                        <img src="/assets/img/logo-2.jpeg" alt="service law main">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="services-law-content content-left-spacer">
                    <div class="section-title section-title-clear-blue">
                        <div class="section-heading-tag">
                            <span class="single-heading-tag">Samudra Media Nusantara</span>
                        </div>
                        <h2>Forum Publikasi Karya Ilmiah & Penelitian</h2>
                        <div class="section-title-description mb-0">
                            <p>Sed ut perspiciatis unde omnis iste natus error voluptate accusantium doloremque
                                laudantium, totam rem aperiam eaque ipsa quae abillo inventore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.services-law-area -->
<!--====== End Services Law Area ======-->
<!--====== Start Contact Area ======-->
<section class="contact-area pt-60 pb-100" id="Contact">
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
                                <p>Bululawang, Malang, Jawa Timur, Indonesia</p>
                            </div>
                        </div>
                        <div class="info-iconic-box wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
                            <div class="info-icon info-icon-gradient-2">
                                <i class="fal fa-envelope-open-text"></i>
                            </div>
                            <div class="info-body">
                                <h5>Email</h5>
                                <p><a
                                        href="mailto:samuderamedianusantara@gmail.com">samuderamedianusantara@gmail.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="info-iconic-box wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1500ms">
                            <div class="info-icon info-icon-gradient-3">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="info-body">
                                <h5>Telepon</h5>
                                <p><a href="tel:082134403154">082134403154</a></p>
                                {{-- <p><a href="tel:+8563214">+8563214</a></p> --}}
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
                                <input type="text" class="form-control" id="fullName" placeholder="Nama mu" name="name"
                                    required>
                                <label for="fullName">Nama mu</label>
                            </div>
                            <div class="input-group">
                                <input type="email" class="form-control" id="emailAddress" placeholder="Email"
                                    name="email" required>
                                <label for="emailAddress">Email</label>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subjek" name="subject"
                                    required>
                                <label for="subject">Subject</label>
                            </div>
                            <div class="input-group form-textarea">
                                <textarea class="form-control" id="message" placeholder="Pesan" name="msg"></textarea>
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
