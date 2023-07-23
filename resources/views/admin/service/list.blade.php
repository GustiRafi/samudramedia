@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Service</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Service list</li>
    </ol>
    <a href="{{ route('service.create') }}" class="btn btn-primary mb-3">Add new</a>
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
                <th>name</th>
                <th>headline</th>
                <th>jumlah paket</th>
                <th>tambah paket</th>
                <th>jumlah fitur</th>
                <th>tambah fitur</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{$service->headline}}</td>
                    <td><a href="{{ route('paket.index', $service->id) }}">{{$service->paket->count()}}</a></td>
                    <td><a href="{{ route('paket.create', $service->id) }}" class="btn btn-primary">Tambah Paket</a></td>
                    <td><a href="{{ route('detail.index', $service->id) }}">{{$service->detail->count()}}</a></td>
                    <td><a href="{{ route('detail.create', $service->id) }}" class="btn btn-primary">Tambah Fitur</a></td>
                    <td class="d-inline">
                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-success"><i
                                class="fas fa-pen"></i></a>
                        <a href="{{ route('service.show', $service->id) }}" class="btn btn-primary"><i
                                class="fas fa-eye"></i></a>
                        <form method="POST" action="{{ route('service.destroy', $service->id) }}" class="d-inline">
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
