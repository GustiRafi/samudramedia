@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Service detail</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">add new detail</li>
    </ol>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('detail.store',$service_id) }}" method="post" enctype="multipart/form-data">
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
        <label for="synopsis mb-3">deskripsi</label>
        <div class="form-floating my-3">
            @error('deskripsi')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi"
                value="{{ old('deskripsi')}}">
            <trix-editor input="deskripsi"></trix-editor>
            {{-- <small>bisa dikosongkan</small> --}}
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
        <a href="{{ route('service.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
    </form>
</div>
</div>
</div>
@endsection