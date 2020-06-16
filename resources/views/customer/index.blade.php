@extends('layout.master')

@section('title', 'Customers')
@section('itemB', 'active')

@section('container')
    <div class="container_content" style="padding: 22px;">
        <div class="container_content">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link @yield('indicatorA', '')" href="/customers">Customer Aktif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('indicatorB', '')" href="/customers/nonaktif">Customer Tidak Aktif</a>
                        </li>
                    </ul>
                </div>
                @yield('tabel')
            </div>
        </div>
    </div>
@endsection
