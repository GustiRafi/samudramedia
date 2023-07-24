@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Journal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">journal list</li>
    </ol>
    <a href="{{ route('journal.create') }}" class="btn btn-primary mb-3">Add new</a>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive">
        <table id="datatable" class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>name</th>
                <th>image</th>
                <th>feature</th>
                <th>link</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($journals as $journal )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $journal->name }}</td>
                    <td class="text-center">
                            <img src="{{ '/storage/journals/'.$journal->image }}" width="256" style="object-fit: contain" alt="">                                            
                    </td>
                    <td>{!! $journal->feature !!}</td>
                    <td><a href="{{ $journal->link }}" target="_blank" rel="noopener noreferrer">{{ $journal->link }}</a></td>
                    <td class="d-inline">
                        <a href="{{ route('journal.edit', $journal->id) }}" class="btn btn-success"><i
                                class="fas fa-pen"></i></a>
                        {{-- <a href="{{ route('journal.show', $journal->id) }}" class="btn btn-primary"><i
                                class="fas fa-eye"></i></a> --}}
                        <form method="POST" action="{{ route('journal.destroy', $journal->id) }}" class="d-inline">
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
@endsection
@section('js')
   <script>
        $('#datatable').DataTable();
   </script>
@endsection
