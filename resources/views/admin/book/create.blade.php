@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Book</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">add new book</li>
    </ol>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                placeholder="Title" value="{{ old('title') }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <img class="d-block img-preview img-fluid mb-3 col-sm-5" id="output">
            <input type="file" class="form-control @error('cover')is-invalid @enderror" name="cover" id="cover"
                placeholder="Cover" value="{{ old('cover') }}" onchange="loadFile(event)" required>
            <label for="cover">Cover</label>
            @error('cover')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('writer')is-invalid @enderror" name="writer" id="writer"
                placeholder="Writer" value="{{ old('writer') }}" required>
            <label for="writer">Writer</label>
            @error('writer')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('subject')is-invalid @enderror" name="subject" id="subject"
                placeholder="subject" value="{{ old('subject') }}" required>
            <label for="subject">subject</label>
            @error('subject')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="synopsis mb-3">synopsis</label>
        <div class="form-floating my-3">
            @error('synopsis')
            <div class="alert alert-danger my-3" role="alert">
                {{ $message }}
            </div>
            @enderror
            <input id="synopsis" type="hidden" name="synopsis"
                value="{{ old('synopsis')}}">
            <trix-editor input="synopsis"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
        <a href="{{ route('book.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
    </form>
</div>
</div>
</div>
@endsection