@extends('layouts.blank')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Log In</h5>
                    <form method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email"
                                class="form-control @error('email')is-invalid @enderror" id="email"
                                placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password')is-invalid @enderror"
                                name="password" id="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                                in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection