@extends('customer.index')

@section('indicatorA', 'active')

@section('tabel')
    @if (count($customers) != 0)
        <div class="card-body">
            <!--Button Cari dan Input Data-->
            <div class="container_top">
                <form action="/customers/search" method="POST">
                    @csrf
                    <div class="item_search">
                        <div class="input-group">
                            <input name="keyword" type="text" class="form-control"
                                   placeholder="Masukkan Pencarian"
                                   aria-label="Recipient's username with two button addons"
                                   aria-describedby="button-addon4">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-outline-secondary" type="submit" name="cari">Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                    <th scope="col" style="width: 40px;">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col" colspan="2" style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr class="content_td">
                        <td style="text-align: center; width: 40px;">{{ $loop->iteration }}</td>
                        <td style="text-align: center">{{ $customer->nama }}</td>
                        <td style="text-align: center">{{ $customer->alamat }}</td>
                        <td style="text-align: center">{{ $customer->kota }}</td>
                        <td style="text-align: center;">{{ $customer->email }}</td>
                        <td style="width: 50px;">
                            <a href="/customers/{{ $customer->id }}/edit">
                                <button class="btn btn-outline-success" id="">Update</button>
                            </a>
                        </td>
                        <td style="width: 50px;">
                            <form action="/customers/{{ $customer->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger" id="">Nonaktif</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @elseif (count($customers) == 0)
        <div class="card-body">
            <p class="card-text">Belum ada Customer Aktif</p>
        </div>
    @endif
@endsection
