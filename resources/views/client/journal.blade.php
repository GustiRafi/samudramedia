@extends('layouts.client')
@section('content')
<section class="hero-area hero-v3 jumbotron bg-solid-dark"
        style="background-image: url(assets/img/hero/map-bg.png);">
        <div class="container mt-5">
            <div class="py-4 text-white col-12 col-lg-6 col-md-6">
                <h3>Journals</h3>
                {{-- <p>Follow our guide to publishing your paper in an Emerald journal and find resources to support you.
                    Our journal publishing infographic will help you understand each step, from submission to
                    publication.</p> --}}
            </div> <!-- /.container -->
    </section> <!-- /.breadcrumb-area -->
    <!--====== End Breadcrumb Area ======-->
    <!--====== Start Service Details Area ======-->
    <section class="service-details-wrapper pt-5 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="service-details-content">
                        <div class="row justify-content-center" id="listjournal">
                            @foreach ($journals as $journal)    
                            <div class="col-12 col-lg-3 col-md-3 mb-3">
                                <div class="card">
                                    <a href="{{$journal->link}}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ '/storage/journals/'.$journal->image }}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                      <h4 class="text-center text-success">{{$journal->name}}</h4>
                                      {!!$journal->feature!!}
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
