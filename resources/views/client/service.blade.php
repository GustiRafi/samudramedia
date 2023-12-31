@extends('layouts.client')
@section('jumbotron')
<div class="page-title wow fadeInDown mb-2" data-wow-delay="0.1s" data-wow-duration="1500ms">
    <h2>{{$service->name}}</h2>
</div>
<div class="page-breadcrumb wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1500ms">
    {{-- <ul class="breadcrumb"> --}}
        {!! $service->deskripsi !!}
        <a href="http://wa.me/{{ env('ADMIN_WHATSAPP') }}?text=halo%20saya%20ingin%20mengetahui%20detail%20{{$service->name}}" class="btn btn-outline-light my-3">Pesan Sekarang</a>
    {{-- </ul> --}}
</div>
@endsection
@section('content')
<!--====== Start Service Details Area ======-->
<section class="service-details-wrapper pt-125 pb-95">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="service-details-content">
                    <h2 class="text-center">Services</h2>
                    <div class="row justify-content-center mt-2">
                        @foreach ($service->detail as $item)    
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <h5 class="text-success">{{$item->name}}</h5>
                                </div>
                                <div class="card-body">
                                    <!-- <blockquote class="blockquote mb-0"> -->
                                    {!! $item->deskripsi !!}
                                    <!-- <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
                                    <!-- </blockquote> -->
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
<section class="service-details-wrapper pt-125 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-details-content">
                    <h2 class="text-center">Paket</h2>
                    <div class="row mt-2 justify-content-center">
                        @foreach ($service->paket as $item)    
                        <div class="col-12 col-lg-4 col-md-4 mb-3">
                            <div class="card border-0 shadow">
                                <div class="card-header bg-primary text-center">
                                    <h5 class="text-center text-white pb-2">{{$item->name}}</h5>
                                    <h3 class="text-white">@currency($item->price)</h3>
                                    {{-- <h5>@currency($item->price)</h5> --}}
                                </div>
                                <div class="card-body text-center">
                                    <!-- <blockquote class="blockquote mb-0"> -->
                                    <div class="pricing-plan-features">
                                        {!! $item->feature !!}
                                    </div>
                                    <!-- <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
                                    <!-- </blockquote> -->
                                </div>
                                <div class="card-footer text-center">
                                    <a href="http://wa.me/{{ env('ADMIN_WHATSAPP') }}?text=halo%20saya%20ingin%20mengetahui%20tentang%20paket%20{{ $item->name }}%20di%20{{$service->name}}" class="btn btn-primary">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<section class="our-services our-services-v3 bg-light-magnolia pt-120 pb-100" id="Service">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center mb-45">
                    <h2>You might also like</h2>
                    <!-- <div class="section-title-description">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium totam rem aperiam eaque</p>
                    </div> -->
                </div>
            </div>
        </div>
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
</section>
<!--====== End Service Details Area ======-->
@endsection
