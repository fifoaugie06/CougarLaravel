@extends('layout.master')

@section('title', 'Transactions')
@section('itemC', 'active')

@section('container')
    <div style="padding: 32px;">

        <!-- Begin Page Content -->
        <div>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <a href="{{ url('/transactions/export_excel') }}"
                   class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transactions

                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transactionsTotally }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings
                                        (Totally)
                                    </div>
                                    <div
                                        class="h5 mb-0 font-weight-bold text-gray-800">{{ 'Rp '. number_format($earningsTotally, 0) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customers
                                        (Non-Active)
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div
                                                class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ number_format($percentageCustomerAktif, 2) . '%' }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                     style="width: {{ number_format($percentageCustomerAktif, 2) . '%' }}"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Products
                                        (Totally)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productsCount }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search atas -->

        <div class="card">
            <div class="card-body">
            @if ($transactionsTotally != 0)
                <!--Button Cari dan Input Data-->
                    <div class="container_top">
{{--                        <form action="" method="POST">--}}
{{--                            @csrf--}}
{{--                            <div class="item_search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input name="keyword" type="text" class="form-control"--}}
{{--                                           placeholder="Masukkan Pencarian"--}}
{{--                                           aria-label="Recipient's username with two button addons"--}}
{{--                                           aria-describedby="button-addon4">--}}
{{--                                    <div class="input-group-append" id="button-addon4">--}}
{{--                                        <button class="btn btn-outline-secondary" type="submit" name="cari">Cari--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>

                    <!--TABEL-->
                    <table class="table table-bordered" border="1">
                        <thead>
                        <tr class="tr-product">
                            <th scope="col" style="width: 40px;">No</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Tanggal Pembelian</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr class="content_td">
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center">{{ $transaction->nama }}</td>
                                <td style="text-align: center">{{
                                $transaction->namabarang . ' ' . $transaction->merk . ' ' . $transaction->type
                             }}</td>
                                <td style="text-align: center">{{ number_format($transaction->harga, 0)}}</td>
                                <td style="text-align: center">{{ $transaction->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="card-body">
                        <p class="card-text" style="font-size: 13px;">Belum ada Transaksi Masuk</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
