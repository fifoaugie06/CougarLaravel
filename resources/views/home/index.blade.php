@extends('layout.master')

@section('title', 'Cougar Counter')

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
            <div class="container" style="padding: 0;">
                <div class="row" style="margin-top: 22px;">
                    <div class="col-md-4">
                        <div class="card border-secondary mb-4 box-shadow" style="">
                            <img class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                                 alt="Card image cap" src="">
                            <div class="card-body">
                                <h5 class="card-text">asd</h5>
                                <p class="card-text">Rp.123</p>
                                <p class="card-text">lorem</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="#" method="post">
                                        <div class="btn-group">
                                            <input type="hidden" name="kode_barang" value="">
                                            <input type="hidden" name="kode_pembeli" value="">
                                            <button type="submit" class="btn btn-sm btn-outline-dark" name="order">
                                                Order
                                            </button>
                                        </div>
                                    </form>
                                    <small class="text-muted">10 Tersisa</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting
                    started guide</a>.</p>
        </div>
    </footer>
@endsection
