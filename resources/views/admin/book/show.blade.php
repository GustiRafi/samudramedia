@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Book</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">detail book</li>
    </ol>
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($book->images as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                      <img src="{{ '/storage/books/'.$image->path }}" class="d-block w-100" alt="...">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6 mb-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="title" id="title"
                        placeholder="Title" value="{{ old('title',$book->title) }}" required readonly>
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="category" id="category"
                        placeholder="category" value="{{ old('category',$book->category->name) }}" required readonly>
                    <label for="category">category</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="price" id="price"
                        placeholder="price" value="@currency($book->price)" required readonly>
                    <label for="price">Harga</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="writer" id="writer"
                        placeholder="Writer" value="{{ old('writer',$book->writer) }}" required readonly>
                    <label for="writer">Writer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="tahun_terbit" id="tahun_terbit"
                        placeholder="tahun_terbit" value="{{ old('tahun_terbit',$book->tahun_terbit) }}" required readonly>
                    <label for="tahun_terbit">tahun terbit</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="ukuran" id="ukuran"
                        placeholder="ukuran" value="{{ old('ukuran',$book->ukuran) }}" required readonly>
                    <label for="ukuran">Ukuran buku</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="tebal" id="tebal"
                        placeholder="tebal" value="{{ old('tebal',$book->tebal) }}" required readonly>
                    <label for="tebal">Tebal buku</label>
                </div>
                <div class="form-floating mb-3">
                    <h5>deskripsi</h5>
                    {!! $book->deskripsi !!}
                </div>
                <a href="{{ route('book.index') }}" class="btn btn-secondary my-3"><i class="fas fa-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
</div>
</div>
@endsection