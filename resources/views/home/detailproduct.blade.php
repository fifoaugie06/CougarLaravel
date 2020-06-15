@extends('layout.master')

@section('title', 'Detail Product')

@section('container')
    <div class="container mt-4">
        <div class="card bg-light mb-3" style="padding-top: 22px;">
            <img src="{{ url('storage/images/'.$product -> gambar) }}" style="max-width: 25em;"
                 class="rounded mx-auto d-block img-thumbnail" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->namabarang . ' ' .$product->merk . ' ' . $product->type }}</h5>
                <p class="card-text">{{ 'Rp. ' . number_format($product->harga, 0) }}</p>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text"><small class="text-muted">{{ $product->stok . ' Tersisa' }}</small></p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <div>
                        <button type="submit" class="btn btn-sm btn-outline-primary" name="order">
                            Like!
                        </button>
                        <button type="submit" class="btn btn-sm btn-outline-dark" name="order">
                            Tambahkan Transaksi
                        </button>
                    </div>
                    <p class="card-text"><small
                            class="text-muted">{{ $likesCount . ' Orang Menyukai Produk ini' }}</small></p>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Review
            </div>
            <div class="card-body">
                <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-outline-dark" name="order">
                    Tambahkan Review
                </button>
            </div>
        </div>
        <div class="card mt-2 mb-5">
            @switch($comentars)
                @case(count($comentars) > 0)
                @foreach($comentars as $comentar)
                    <div class="card-body">
                        <h5 class="card-text">{{ $comentar->nama }}</h5>
                        <p class="card-title" style="font-size: 12px;">{{ $comentar->created_at }}</p>
                        <p class="card-text">{{ $comentar->isi_komentar }}</p>
                    </div>
                @endforeach
                @break
                @case(count($comentars) == 0)
                <div class="card-body">
                    <p class="card-text" style="font-size: 12px;">Belum ada Review Product</p>
                </div>
                @break
            @endswitch
        </div>
    </div>
    @include('home.components.footer')
@endsection
