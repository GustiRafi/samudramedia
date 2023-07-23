@extends('layouts.client')
@section('css')
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* 
body {
  background: #000;
  color: #000;
} */

    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .mySwiper2 {
        height: 80%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>
@endsection
@section('content')
<!--====== Start Breadcrumb Area ======-->
<section class="hero-area hero-v3 jumbotron bg-solid-dark" style="background-image: url(assets/img/hero/map-bg.png);">
    <div class="container mt-5">
        <div class="py-4 text-white col-12 col-lg-6 col-md-6">
            <h3>{{ $book->title }}</h3>
        </div> <!-- /.container -->
</section> <!-- /.breadcrumb-area -->
<!--====== End Breadcrumb Area ======-->
<!--====== Start Service Details Area ======-->
<section class="service-details-wrapper pt-5 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-details-content">
                    <!-- <h2 class="text-center">Prepare & submit your paper</h2> -->
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-6 col-12">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                    class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        @foreach($book->images as $image)
                                            <div class="swiper-slide">
                                                <img
                                                    src="{{ '/storage/books/'.$image->path }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach($book->images as $image)
                                            <div class="swiper-slide">
                                                <img
                                                    src="{{ '/storage/books/'.$image->path }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="card-body">
                                    <h3 class="card-title text-primary">{{ $book->title }}</h3>
                                    <p class="card-text">Kategori : {{ $book->category->name }}</p>
                                    <p class="card-text">Penulis : {{ $book->writer }}</p>
                                    <p class="card-text">Tahun Terbit : {{ $book->Tahun_terbit }}</p>
                                    <p class="card-text">Ukuran Buku : {{ $book->ukuran }}</p>
                                    <p class="card-text">Tebal : {{ $book->tebal }}</p>
                                    <p class="card-text">Jenis Kertas : {{ $book->kertas }}</p>
                                    <h6 class="card-text">Deskripsi</h6>
                                    <p>{!! $book->deskripsi !!}</p>
                                    <a href="http://wa.me/{{ env('ADMIN_WHATSAPP') }}?text=halo%20saya%20ingin%20membeli%20buku%20dengan%20judul%20{{ $book->title }}"
                                        target="_blank" class="btn btn-success"><i class="fa-solid fa-bag-shopping"></i> Beli</a>
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
@section('js')
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });

</script>
@endsection
