@extends('layouts.app')
@section('judul', 'Detail Alat')

@section('konten')
  <h2>{{ $alat->nama }}</h2>
  <p>Kode: {{ $alat->kode }}</p>
  <p>Stok: {{ $alat->stok }}</p>
  <p>Kondisi: {{ $alat->kondisi }}</p>
  <p>Lokasi: {{ $alat->lokasi ?? '-' }}</p>
  <a href="{{ route('alat.index') }}">Kembali</a>
@endsection