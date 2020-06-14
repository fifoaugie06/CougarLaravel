@extends('layout.master')

@section('title', 'Tambah Product')

@section('container')
    <div class="container mt-4 border" style="padding: 26px;">
        <form method="POST" action="@yield('action')" enctype="multipart/form-data">
            @yield('method')
            @csrf
            <div class="form-group">
                <label for="NamaBarang">Nama Barang</label>
                <input type="text" class="form-control @error('namabarang') is-invalid @enderror"
                       id="NamaBarang" name="namabarang" value="@yield('namabarang', '')">
                @error('namabarang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Merk">Merk</label>
                <input type="text" class="form-control @error('merk') is-invalid @enderror"
                       id="Merk" name="merk" value="@yield('merk', '')">
                @error('merk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Type">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror"
                       id="Type" name="type" value="@yield('type', '')">
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Harga">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror"
                       id="Harga" name="harga" value="@yield('harga', '')">
                @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Stok">Stok</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror"
                       id="Stok" name="stok" value="@yield('stok', '')">
                @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Description">Deskripsi</label>
                <textarea id="Description" class="form-control @error('description') is-invalid @enderror"
                          name="description" rows="8">@yield('description', '')</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="file" name="gambar" id="gambar" class="mt-2">
            @error('gambar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-3 mb-5" style="width: 250px; height: 40px;">
                    @yield('namabutton')
                </button>
            </div>
        </form>
    </div>
@endsection
