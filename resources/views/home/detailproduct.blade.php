@extends('layout.master')

@section('title', 'Detail Product')

@section('container')
    <div class="container mt-4">
        @if (session('modal'))
            <script type="text/javascript">
                window.onload = function () {
                    let button = document.getElementById('clickButton');
                    button.click();
                }
            </script>
            <button type="button" data-toggle="modal" data-target="#exampleModal" id="clickButton"
                    style="display: none"></button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Success!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ session('modal') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                        @if ($stok->stok != 0)
                            <form method="POST" action="/transactions">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-dark ml-2">
                                    Beli Produk
                                </button>
                            </form>
                        @else
                            <button type="submit" class="btn btn-sm btn-outline-danger ml-2">
                                Stok Habis
                            </button>
                        @endif
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
