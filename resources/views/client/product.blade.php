@extends('layouts.client')
@section('content')
<!--====== Start Breadcrumb Area ======-->
<section class="hero-area hero-v3 jumbotron bg-solid-dark" style="background-image: url(assets/img/hero/map-bg.png);">
    <div class="container mt-5">
        <div class="py-4 text-white col-12 col-lg-6 col-md-6">
            <h3>Detail Produk</h3>
        </div> <!-- /.container -->
</section> <!-- /.breadcrumb-area -->
<!--====== End Breadcrumb Area ======-->
<!--====== Start Service Details Area ======-->
<section class="service-details-wrapper pt-125 pb-95">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="service-details-content">
                    <h2 class="text-center">{{ $produk->name }}</h2>
                    <div class="row mt-2">
                        <div class="col-12 mb-3">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-6 col-12">
                                        <img src="{{ '/storage/products/'.$produk->image }}" />
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card-body">
                                            <p>{!! $produk->deskripsi !!}</p>
                                            <a href="http://wa.me/{{ env('ADMIN_WHATSAPP') }}?text=halo%20saya%20ingin%20mengetahui%20detail%20tentang%20produk%20{{ $produk->name }}"
                                                target="_blank" class="btn btn-success"><i
                                                    class="fa-solid fa-bag-shopping"></i> Pesan Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section> <!-- /.service-details-wrapper -->
<!--====== End Service Details Area ======-->
@endsection
