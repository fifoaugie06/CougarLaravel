@extends('product.components.form')

@section('method')
    @method('PUT')
@endsection

@section('action'){{ '/products/'.$product->id }}@endsection
@section('namabutton', 'Update Barang')

@section('namabarang'){{ $product->namabarang }}@endsection
@section('merk'){{ $product->merk }}@endsection
@section('type'){{ $product->type }}@endsection
@section('harga'){{ $product->harga }}@endsection
@section('stok'){{ $product->stok }}@endsection
@section('description'){{ $product->description }}@endsection
