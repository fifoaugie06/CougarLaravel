@extends('layout.master')

@section('title', 'Cougar Counter')

@section('searchbox')
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
@endsection

@section('container')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container" style="height: 300px; padding-top: 50px;">
                <h1 class="jumbotron-heading text-white">Cougar Counter</h1>
                <p class="lead text-white-50">Solusi Belanja Online Mudah dan Hemat <br>
                    Temukan Segala Macam Produk IT Unggulan dengan Transaksi Aman dan Menguntungkan <br>
                    Jika Barang yang Anda Cari tidak Tersedia di List Hubungi Kami.</p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card border-secondary mb-4 box-shadow">
                                <img class="card-img-top"
                                     data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                                     alt="Card image cap" src="{{ url('storage/images/'.$product -> gambar) }}">
                                <div class="card-body">
                                    <h5 class="card-text">{{ $product->namabarang . ' ' .$product->merk . ' ' . $product->type }}</h5>
                                    <p class="card-text">{{ 'Rp. ' . number_format($product->harga, 0) }}</p>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description, 200, $end='...') }}</p>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="/products/{{ $product->id }}">
                                            <div class="btn-group">
                                                <input type="hidden" name="kode_barang" value="">
                                                <input type="hidden" name="kode_pembeli" value="">
                                                <button type="submit" class="btn btn-sm btn-outline-dark" name="order">
                                                    Detail
                                                </button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    @include('home.components.footer')
@endsection
