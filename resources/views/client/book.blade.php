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
                            <h1>List Books</h1>
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
                    <!-- <h2 class="text-center">Prepare & submit your paper</h2> -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 col-md-8 mb-4">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="Search here...">
                                    <button class="input-group-text"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="listBook">
                        @foreach($books as $book)
                            <div class="col-12 col-lg-4 col-md-4 mb-3">
                                <div class="card">
                                    <img src="{{ '/storage/books/'.$book->images[0]->path }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <h5 class="text-primary">@currency($book->price)</h5>
                                        <p class="card-text">Kategori : {{ $book->category->name }}</p>
                                        <p class="card-text">Penulis : {{ $book->writer }}</p>
                                    </div>
                                    <div class="card-body">
                                        <!-- <a href="#" class="card-link">Card link</a> -->
                                        <a href="{{ route('book', $book->slug) }}"
                                            class="card-link"><i class="fas fa-search"></i> Lihat Detail</a>
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
@section('js')
<script>
    $(document).ready(function () {
        $("#name").keyup(function () {
            const value = $(this).val();
            $.ajax({
                type: 'get',
                url: '/search',
                data: {
                    'name': value
                },
                success: function (data) {
                    $('#listBook').html(data);
                }
            });

        });
    });

</script>
@endsection
