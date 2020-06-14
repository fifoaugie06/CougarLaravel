@extends('layout.master')

@section('title', 'Update Product')

@section('container')
    <div class="container mt-4 border" style="padding: 26px;">
        <form method="POST" action="/customers/{{ $customer->id }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="Nama">Nama Customer</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                       id="Nama" name="nama" value="{{ $customer->nama }}">
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                       id="alamat" name="alamat" value="{{ $customer->alamat }}">
                @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control @error('kota') is-invalid @enderror"
                       id="kota" name="kota" value="{{ $customer->kota }}">
                @error('kota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ $customer->email }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-3 mb-5" style="width: 250px; height: 40px;">
                    Update Customer
                </button>
            </div>
        </form>
    </div>
@endsection
