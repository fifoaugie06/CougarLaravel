@extends('layout.masterbootstrap')

@section('body')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/homes') }}">Cougar Counter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @yield('itemA')">
                        <a class="nav-link" href="{{ url('/products') }}">Product</a>
                    </li>
                    <li class="nav-item @yield('itemB')">
                        <a class="nav-link" href="{{ url('/customers') }}">Customer</a>
                    </li>
                    <li class="nav-item @yield('itemC')">
                        <a class="nav-link" href="{{ url('/transactions') }}">Transaction</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item disabled">{{ \Illuminate\Support\Facades\Session::get('username') }}</a>
                            <a class="dropdown-item disabled">{{ \Illuminate\Support\Facades\Session::get('email') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </li>
                </ul>
                @yield('searchbox')
            </div>
        </div>
    </nav>

    @yield('container')
@endsection
