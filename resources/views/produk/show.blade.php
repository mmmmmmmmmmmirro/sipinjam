@extends('layouts.app')
@section('judul', 'Detail Produk')

@section('konten')
  <h2>{{ $produk->nama }}</h2>
  <p>Kode: {{ $produk->kode }}</p>
  <p>Kategori: {{ $produk->kategori }}</p>
  <p>Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
  <p>Stok: {{ $produk->stok }}</p>
  <a href="{{ route('produk.index') }}">Kembali</a>
@endsection