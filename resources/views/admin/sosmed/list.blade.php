@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Media Sosial</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">media sosial</li>
    </ol>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="{{ route('sosmed.create') }}" class="btn btn-primary mb-3">Tambah Baru</a>
    <table id="datatable" class="table table-responsive">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>icon</th>
            <th>link</th>
            <th>action</th>
        </tr>
        @foreach($sosmeds as $sosmed )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $sosmed->name }}</td>
                <td>
                    <h4><i class="fa-brands fa-{{ $sosmed->name }}"></i></h4>
                </td>
                <td>
                    <a href="{{ $sosmed->link }}" target="_blank">{{ $sosmed->link }}</a>
                </td>
                <td class="d-flex">
                    <a href="/dashboard/sosmed/{{ $sosmed->id }}/edit" class="btn btn-success"><i
                            class="fas fa-pen">edit</i></a>
                    <form method="POST" action="{{ route('sosmed.destroy', $sosmed->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Delete"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                            class="bg-danger text-white btn d-flex justify-content-center mb-2">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</div>
</div>
@endsection
