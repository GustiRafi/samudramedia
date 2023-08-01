@extends('layouts.client')
@section('content')
<!--====== Start Hero Area ======-->
<section class="hero-area hero-v2 bg-contain bg-ocean-blue hero-padding"
    style="background-image: url(assets/img/hero/hero-map-bg.png);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="card border-0 bg-transparent">
                    <div class="breadcrumb-content text-center text-white">
                        <div class="page-title wow fadeInDown mb-2" data-wow-delay="0.1s" data-wow-duration="1500ms">
                            <h1>List Journals</h1>
                        </div>
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
<!--====== Start Service Details Area ======-->
<section class="service-details-wrapper pt-5 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-details-content">
                    <div class="row justify-content-center" id="listjournal">
                        @foreach($journals as $journal)
                            <div class="col-12 col-lg-3 col-md-3 mb-2">
                                <div class="card single-service-box single-service-box-v2 wow fadeInUp"
                                    data-wow-delay="0.2s" data-wow-duration="1500ms">
                                    <div class="card-img-top">
                                        <a href="{{ $journal->link }}" target="_blank" rel="noopener noreferrer">
                                            <img src="{{ '/storage/journals/'.$journal->image }}"
                                                class="service thumbnail two" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body service-box-content">
                                        <h5 class="service-box-title">{{ $journal->name }}</h5>
                                        <div class="section-list-style list-style-v3 mt-22 mb-35">
                                            {!!$journal->feature!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.service-details-wrapper -->
<!--====== End Service Details Area ======-->
@endsection
