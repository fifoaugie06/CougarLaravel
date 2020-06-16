@extends('layout.master')

@section('title', 'Products')
@section('itemA', 'active')

@section('container')
    <div class="container_content" style="padding: 22px">
        <div class="container_content">
            <!--Button Cari dan Input Data-->
            <div class="container_top">
                <form action="" method="POST">
                    <div class="item_search">
                        <div class="input-group">
                            <input name="keyword" type="text" class="form-control" placeholder="Masukkan Pencarian"
                                   aria-label="Recipient's username with two button addons"
                                   aria-describedby="button-addon4">
                            <div class="input-group-append" id="button-addon4">
                                <select id="filter" class="btn btn-outline-secondary" name="searchby">
                                    <option value="nama_barang">Nama Barang</option>
                                    <option value="merk">Merk</option>
                                    <option value="type">Type</option>
                                    <option value="harga">Harga</option>
                                    <option value="stok">Stok</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="submit" name="cari">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="item_input">
                    <a href="/products/create">
                        <button type="button" class="btn btn-primary">Tambah Barang</button>
                    </a>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> {{ session('status') }}
                </div>
        @endif

        <!--TABEL-->
            <table class="table table-striped" border="1">
                <thead>
                <tr class="tr-product">
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Type</th>
                    <th scope="col" style="width: 700px">Description</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Created At</th>
                    <th scope="col" colspan="2" style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="content_td">
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td style="text-align: center">
                            <a href="{{ url('storage/images/'.$product -> gambar) }}">Lihat Gambar</a>
                        </td>
                        <td style="text-align: center">{{ $product -> namabarang }}</td>
                        <td style="text-align: center">{{ $product -> merk }}</td>
                        <td style="text-align: center">{{ $product -> type }}</td>
                        <td>{{ $product -> description }}</td>
                        <td style="text-align: center;">{{ $product -> harga }}</td>
                        <td style="text-align: center;">{{ $product -> stok }}</td>
                        <td style="text-align: center;">{{ $product -> created_at }}</td>
                        <td style="width: 50px;">
                            <a href="/products/{{ $product->id }}/edit">
                                <button class="btn btn-outline-success" id="">Update</button>
                            </a>
                        </td>
                        <td style="width: 50px;">
                            <form action="/products/{{ $product->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger" id="">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
