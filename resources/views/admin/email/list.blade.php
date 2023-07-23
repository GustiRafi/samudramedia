@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">email</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">email list</li>
    </ol>

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
                <th>nama</th>
                <th>email</th>
                <th>subject</th>
                <th>status</th>
                <th>pesan</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emails as $email )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $email->name }}</td>
                    <td>{{$email->email}}</td>
                    <td>{{$email->subject}}</td>
                    <td>
                        @if ($email->status === 'terkirim')
                            <span class="badge bg-danger m-2">Belum dibalas</span>
                        @else
                        <span class="badge bg-success m-2">Sudah dibalas<span>
                        @endif
                    </td>
                    <td>{{$email->msg}}</td>
                    <td>
                        @if ($email->status === 'terkirim')    
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#reply{{$email->id}}">
                            <i class="fas fa-reply"></i>
                        </button>
    
                        <!-- Modal -->
                        <div class="modal fade" id="reply{{$email->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Reply</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('email.reply', $email->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control @error('emailto')is-invalid @enderror"
                                                    name="emailto" id="emailto" placeholder="Reply To"
                                                    value="{{ old('emailto',$email->email) }}" required readonly>
                                                <label for="email">Reply To</label>
                                                @error('emailto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <input type="hidden" value="demo@journal.id3.icu" name="email"> --}}
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control @error('name')is-invalid @enderror"
                                                    name="name" id="name" placeholder="Reply To"
                                                    value="{{ old('name',$email->name) }}" required readonly>
                                                <label for="name">Reply To</label>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control @error('email')is-invalid @enderror"
                                                    name="email" id="email" placeholder="From"
                                                    value="demo@journal.id3.icu" required readonly>
                                                <label for="email">From</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control @error('subject')is-invalid @enderror"
                                                    name="subject" id="subject" placeholder="Subject" required>
                                                <label for="subject">Subject</label>
                                                @error('subject')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating my-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Message" id="msg" name="msg" style="height: 100px"></textarea>
                                                    <label for="msg">Message</label>
                                                  </div>
                                                @error('msg')
                                                <div class="alert alert-danger my-3" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <form method="POST"
                            action="{{ route('email.destroy', $email->id) }}"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
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
