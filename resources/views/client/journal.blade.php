@extends('layouts.client')
@section('jumbotron')
<div class="page-title wow fadeInDown mb-2" data-wow-delay="0.1s" data-wow-duration="1500ms">
    <h2>List Journals</h2>
</div>
@endsection
@section('content')
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
