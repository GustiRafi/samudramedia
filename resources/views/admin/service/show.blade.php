@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Service</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">detail service</li>
    </ol>
    <a href="{{ route('service.index') }}" class="btn btn-secondary my-3"><i class="fas fa-arrow-left"></i>Back</a>
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <img src="{{ '/storage/services/'.$service->image }}" class="img-fluid mb-3" alt=""> 
            <div class="form-floating mb-3">
                <input type="text" class="form-control " name="name" id="name" placeholder="Name"
                    value="{{ old('name',$service->name) }}" required readonly>
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="headline" id="headline" name="headline"
                    style="height: 100px" readonly>{{ $service->headline }}</textarea>
                <label for="headline">Headline</label>
            </div>
            <div class="form-floating mb-3">
                <h5>deskripsi</h5>
                {!! $service->deskripsi !!}
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <div class="mb-3">
                <h5>Paket Service</h5>
                <table class="table table-responsive">
                    <tr>
                        <th>No</th>
                        <th>name</th>
                        <th>feature</th>
                        <th>spesifikasi</th>
                        <th>Harga</th>
                        <th>action</th>
                    </tr>
                    @foreach($service->paket as $paket )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paket->name }}</td>
                            <td>{!!$paket->feature!!}</td>
                            <td>
                                @if ($paket->spesifikasi)
                                {!!$paket->spesifikasi!!}
                                @else
                                    <p>tidak ada</p>
                                @endif
                            </td>
                            <td>@currency($paket->price)</td>
                            <td class="d-inline">
                                <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-success"><i
                                        class="fas fa-pen"></i></a>
                                <form method="POST" action="{{ route('paket.destroy', $paket->id) }}" class="d-inline">
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
                </table>
            </div>
            <div class="mb-3">
                <h5>Detail / Fitur</h5>
                <table class="table table-responsive">
                    <tr>
                        <th>No</th>
                        <th>name</th>
                        <th>deskripsi</th>
                        <th>action</th>
                    </tr>
                    @foreach($service->detail as $detail )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detail->name }}</td>
                            <td>{!!$detail->deskripsi!!}</td>
                            <td class="d-inline">
                                <a href="{{ route('detail.edit', $detail->id) }}" class="btn btn-success"><i
                                        class="fas fa-pen"></i></a>
                                <form method="POST" action="{{ route('detail.destroy', $detail->id) }}" class="d-inline">
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
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
