@extends('layouts.app')
@section('judul', 'Ubah Alat')

@section('konten')
  @if ($errors->any())
    <ul style="color:red">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  @endif

  <form method="POST" action="{{ route('alat.update', $alat) }}">
    @csrf
    @method('PUT')
    <p>Kode: <input name="kode" value="{{ old('kode', $alat->kode) }}"></p>
    <p>Nama: <input name="nama" value="{{ old('nama', $alat->nama) }}"></p>
    <p>Stok: <input name="stok" type="number" value="{{ old('stok', $alat->stok) }}"></p>
    <p>Kondisi:
      <select name="kondisi">
        @foreach (['baik','rusak ringan','rusak berat'] as $k)
          <option value="{{ $k }}" @selected(old('kondisi', $alat->kondisi) == $k)>{{ $k }}</option>
        @endforeach
      </select>
    </p>
    <p>Lokasi: <input name="lokasi" value="{{ old('lokasi', $alat->lokasi) }}"></p>
    <button type="submit">Perbarui</button>
  </form>
@endsection