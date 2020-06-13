@extends('layout.master')

@section('title', 'Tambah Product')

@section('container')
    <div class="container mt-4 border" style="padding: 26px;">
        <form method="POST" action="/products">
            @csrf
            <div class="form-group">
                <label for="NamaBarang">Nama Barang</label>
                <input type="text" class="form-control" id="NamaBarang" name="namabarang">
            </div>
            <div class="form-group">
                <label for="Merk">Merk</label>
                <input type="text" class="form-control" id="Merk" name="merk">
            </div>
            <div class="form-group">
                <label for="Type">Type</label>
                <input type="text" class="form-control" id="Type" name="type">
            </div>
            <div class="form-group">
                <label for="Harga">Harga</label>
                <input type="number" class="form-control" id="Harga" name="harga">
            </div>
            <div class="form-group">
                <label for="Stok">Stok</label>
                <input type="number" class="form-control" id="Stok" name="stok">
            </div>
            <div class="form-group">
                <label for="Description">Deskripsi</label>
                <textarea id="Description" class="form-control" name="description" rows="8"></textarea>
            </div>
            <input type="file" name="gambar" id="gambar" class="mt-2">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-3 mb-5" style="width: 250px; height: 40px;">Tambahkan Barang</button>
            </div>
        </form>
    </div>
@endsection
