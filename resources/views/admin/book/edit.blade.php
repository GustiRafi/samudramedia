@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Book</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">edit book</li>
    </ol>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                placeholder="Title" value="{{ old('title',$book->title) }}" required>
            <label for="title">Title</label>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="category_id">Categori</label>
            <select class="form-select"  @error('category_id')is-invalid @enderror" name="category_id" id="category_id" aria-label="Default select example">
                @foreach ($categori as $item)
                @if ($item->id === $book->category_id)    
                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
                @endforeach
              </select>
            @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="mb-3 d-flex border p-3 rounded" id="preview"></div>
            <input type="file" class="form-control @error('images[]')is-invalid @enderror" name="images[]" id="images"
                placeholder="Cover" value="{{ old('images[]') }}" onchange="loadFile(event)" multiple>
            <label for="images[]">Cover</label>
            @error('images[]')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <small>Anda dapat mengupload file lebih dari satu</small>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('writer')is-invalid @enderror" name="writer" id="writer"
                placeholder="Writer" value="{{ old('writer',$book->writer) }}" required>
            <label for="writer">Writer</label>
            @error('writer')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control @error('price')is-invalid @enderror" name="price" id="price"
                placeholder="Harga" value="{{ old('price',$book->price) }}" required>
            <label for="price">Harga</label>
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control @error('tahun_terbit')is-invalid @enderror" name="tahun_terbit" id="tahun_terbit"
                placeholder="Tahun Terbit" value="{{ old('tahun_terbit',$book->tahun_terbit) }}" required>
            <label for="tahun_terbit">Tahun Terbit</label>
            @error('tahun_terbit')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('ukuran')is-invalid @enderror" name="ukuran" id="ukuran"
                placeholder="Ukuran Buku" value="{{ old('ukuran',$book->ukuran) }}" required>
            <label for="ukuran">Ukuran Buku</label>
            @error('ukuran')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('tebal')is-invalid @enderror" name="tebal" id="tebal"
                placeholder="Tebal Buku" value="{{ old('tebal',$book->tebal) }}" required>
            <label for="tebal">Tebal Buku</label>
            @error('tebal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('kertas')is-invalid @enderror" name="kertas" id="kertas"
                placeholder="Jenis Kertas" value="{{ old('kertas',$book->kertas) }}" required>
            <label for="kertas">Jenis Kertas</label>
            @error('kertas')
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
                value="{{ old('deskripsi',$book->deskripsi)}}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
        <a href="{{ route('book.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
    </form>

    <div class="mb-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book->images as $image)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $image->path }}</td>
                        <td>
                            <img src="{{ '/storage/books/'.$image->path }}" width="256" style="object-fit: contain" alt="">                                            
                        </td>
                        <td>
                            <form method="POST" action="{{ route('bookImage.destroy', $image->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" class="bg-danger text-white btn d-flex justify-content-center mb-2">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
@section('js')
<script>
    function readURL(input) {
        $('#preview').html('')
        if (input.files && input.files[0]) {
            Array.from(input.files).forEach(imgs => {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').append(`
                        <img style="object-fit: contain;" width="128" class="mr-2" src='${e.target.result}' />
                    `)
                }

                reader.readAsDataURL(imgs);
            });
        }
    }

    $("input[type=file]").change(function(e){
        readURL(e.target);
    });
</script>
@endsection