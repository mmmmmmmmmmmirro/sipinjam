@extends('layouts.app')
@section('judul', 'Tambah Produk')

@section('konten')
  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('produk.store') }}">
    @csrf
    <p>Kode: <input name="kode" value="{{ old('kode') }}"></p>
    <p>Nama: <input name="nama" value="{{ old('nama') }}"></p>
    <p>Kategori: <input name="kategori" value="{{ old('kategori') }}"></p>
    <p>Harga: <input name="harga" type="number" value="{{ old('harga') }}"></p>
    <p>Stok: <input name="stok" type="number" value="{{ old('stok') }}"></p>
    <button type="submit">Simpan</button>
  </form>
@endsection