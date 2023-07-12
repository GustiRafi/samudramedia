@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Book</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">detail book</li>
    </ol>
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <img src="{{ asset('storage/book/'.$book->cover) }}" class="img-fluid" alt="" srcset="">
        </div>
        <div class="col-12 col-lg-6 col-md-6 mb-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="title" id="title"
                        placeholder="Title" value="{{ old('title',$book->title) }}" required readonly>
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="writer" id="writer"
                        placeholder="Writer" value="{{ old('writer',$book->writer) }}" required readonly>
                    <label for="writer">Writer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " name="subject" id="subject"
                        placeholder="subject" value="{{ old('subject',$book->subject) }}" required readonly>
                    <label for="subject">subject</label>
                </div>
                <div class="form-floating mb-3">
                    <h5>synopsis</h5>
                    {!! $book->synopsis !!}
                </div>
                <a href="{{ route('book.index') }}" class="btn btn-secondary my-3"><i class="fas fa-arrow-left"></i>Back</a>
        </div>
    </div>
</div>
</div>
</div>
@endsection