@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail {{$service->name}}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">detail service list</li>
    </ol>
    <a href="{{ route('detail.create', $service->id) }}" class="btn btn-primary">Tambah Detail</a>
    <a href="{{ route('service.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
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
                <th>deskripsi</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{!!$item->deskripsi!!}</td>
                    <td class="d-inline">
                        <a href="{{ route('detail.edit', $item->id) }}" class="btn btn-success"><i
                                class="fas fa-pen"></i></a>
                        <form method="POST" action="{{ route('detail.destroy', $item->id) }}" class="d-inline">
                            @csrf
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
</div>
@endsection
@section('js')
   <script>
        $('#datatable').DataTable();
   </script>
@endsection
