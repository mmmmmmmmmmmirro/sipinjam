@extends('layouts.app')
@section('judul', 'Ubah Produk')

@section('konten')
  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('produk.update', $produk) }}">
    @csrf
    @method('PUT')
    <p>Kode: <input name="kode" value="{{ old('kode', $produk->kode) }}"></p>
    <p>Nama: <input name="nama" value="{{ old('nama', $produk->nama) }}"></p>
    <p>Kategori: <input name="kategori" value="{{ old('kategori', $produk->kategori) }}"></p>
    <p>Harga: <input name="harga" type="number" value="{{ old('harga', $produk->harga) }}"></p>
    <p>Stok: <input name="stok" type="number" value="{{ old('stok', $produk->stok) }}"></p>
    <button type="submit">Perbarui</button>
  </form>
@endsection