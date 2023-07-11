@extends('layouts.dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">change profile or password</li>
    </ol>
    @if(session('error'))
        <div class="alert alert-danger  my-3">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <h4>Change Profile Information</h4>
            <form action="{{ route('user-profile-information.update') }}" method="post">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name"
                        placeholder="Name" value="{{ auth()->user()->name }}" required>
                    <label for="name">Your Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email"
                        placeholder="name@example.com" value="{{ auth()->user()->email }}" required>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <h4>Change Password</h4>
            <form action="{{ route('changepassword') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="password" name="currentpassword"
                        class="form-control @error('currentpassword')is-invalid @enderror" id="currentpassword"
                        placeholder="currentpassword" value="">
                    <label for="currentpassword">Current Password</label>
                    @error('currentpassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror"
                        id="password" placeholder="name@example.com" value="" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
