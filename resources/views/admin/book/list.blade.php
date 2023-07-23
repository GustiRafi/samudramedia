@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Book</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">book list</li>
    </ol>
    <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Add new</a>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-responsive" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>title</th>
                <th>categori</th>
                <th>cover</th>
                <th>Harga</th>
                <th>writer</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{$book->category->name}}</td>
                    <td class="text-center">
                        @if (isset($book->images[0]))
                            <img src="{{ '/storage/books/'.$book->images[0]->path }}" width="256" style="object-fit: contain" alt="">                                            
                        @endif
                    </td>
                    <td>@currency($book->price)</td>
                    <td>{{ $book->writer }}</td>
                    <td class="d-inline">
                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success"><i
                                class="fas fa-pen"></i></a>
                        <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary"><i
                                class="fas fa-eye"></i></a>
                        <form method="POST" action="{{ route('book.destroy', $book->id) }}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                class="btn btn-danger">
                                <i class="fas fa-trash"></i>
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
@endsection
@section('js')
   <script>
        $('#datatable').DataTable();
   </script>
@endsection
