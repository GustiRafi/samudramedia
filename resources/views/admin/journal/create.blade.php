@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Journal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">add new journal</li>
    </ol>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('journal.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name"
                placeholder="Title" value="{{ old('name') }}" required>
            <label for="name">Title</label>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <img class="d-block img-preview img-fluid mb-3 col-sm-5" id="output">
            <input type="file" class="form-control @error('image')is-invalid @enderror" name="image" id="image"               
            placeholder="Image" value="{{ old('image') }}" onchange="loadFile(event)" required>
            <label for="image">Image</label>
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('link')is-invalid @enderror" name="link" id="link"
                placeholder="Link google form" value="{{ old('link') }}" required>
            <label for="link">Link google form</label>
            @error('link')
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
        <button type="submit" class="btn btn-primary">Post</button>
        <a href="{{ route('journal.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
    </form>
</div>
</div>
</div>
@endsection