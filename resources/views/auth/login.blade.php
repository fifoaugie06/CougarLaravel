@extends('layout.masterbootstrap')

@section('title', 'Login')

@section('body')
    <div class="container mt-5">
        <div class="card bg-light mb-3 mx-auto">
            <h5 class="card-header">Login Account</h5>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session('status') }} <a href="/"> Login Here.</a>
                    </div>
                @endif
                @if (session('alert'))
                    <div class="alert alert-danger mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Gagal Login!</strong> {{ session('alert') }}
                    </div>
                @endif
                <form action="/" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="mt-3">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="exampleInputPassword1" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                        <button type="submit" class="btn btn-outline-info">Login to your Account!</button>
                    </div>
                </form>
                <a href="{{ url('/register') }}">
                    <button type="submit" class="btn btn-outline-danger mt-3">Register</button>
                </a>
            </div>
        </div>
    </div>
@endsection
