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
                    <div class="d-flex justify-content-between">
                        @if ($conditionLike == 0)
                            <form method="POST" action="/likes">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-primary" name="order">
                                    Like!
                                </button>
                            </form>
                        @else
                            <form method="POST" action="/unlikes">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-danger" name="order">
                                    UnLike!
                                </button>
                            </form>
                        @endif
                        <form method="POST" action="/transactions">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-sm btn-outline-dark ml-2">
                                Beli Produk
                            </button>
                        </form>
                    </div>
                    <p class="card-text">
                        <small
                            class="text-muted">
                            @if ($conditionLike == 0)
                                @if ($likesCount != 0)
                                    {{ $likesCount . ' Orang Menyukai Produk ini' }}
                                @else
                                    {{ 'Belum ada yang Menyukai Produk ini' }}
                                @endif
                            @else
                                @if ($likesCount == 1)
                                    {{ 'Anda Menyukai Produk ini' }}
                                @else
                                    {{ 'Anda, dan '. ($likesCount-1) . ' Orang Menyukai Produk ini' }}
                                @endif
                            @endif
                        </small>
                    </p>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Review
            </div>
            <form method="POST" action="/comentars">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="card-body">
                    <textarea class="form-control" id="comment" name="isi_komentar" rows="5"></textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-outline-dark">
                        Tambahkan Review
                    </button>
                </div>
            </form>
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
