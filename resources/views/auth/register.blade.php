@extends('layout.masterbootstrap')

@section('title', 'Register')

@section('body')
    <div class="container mt-5">
        <div class="card bg-light mb-3 mx-auto">
            <h5 class="card-header">Register New Account</h5>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session('status') }} <a href="/"> Login Here.</a>
                    </div>
                @endif
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Address</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kota">City</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota">
                        @error('kota')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-info">Create New Account!</button>
                </form>
                    <a href="{{ url('/') }}">
                        <button type="submit" class="btn btn-outline-danger mt-3">Login</button>
                    </a>
            </div>
        </div>
    </div>
@endsection
