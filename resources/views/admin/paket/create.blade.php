@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Service paket</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">add new paket</li>
    </ol>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('paket.store',$service_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name"
                placeholder="Name" value="{{ old('name') }}" required>
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control @error('price')is-invalid @enderror" name="price" id="price"
                placeholder="Harga" value="{{ old('price') }}" required>
            <label for="price">Harga</label>
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="synopsis mb-3">feature</label>
        <div class="form-floating my-3">
            @error('feature')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="feature" type="hidden" name="feature"
                value="{{ old('feature')}}">
            <trix-editor input="feature"></trix-editor>
        </div>
        <label for="synopsis mb-3">spesifikasi</label>
        <div class="form-floating my-3">
            @error('spesifikasi')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="spesifikasi" type="hidden" name="spesifikasi"
                value="{{ old('spesifikasi')}}">
            <trix-editor input="spesifikasi"></trix-editor>
            <small>bisa dikosongkan</small>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
        <a href="{{ route('service.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
    </form>
</div>
</div>
</div>
@endsection