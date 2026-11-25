@extends('layouts.app')
@section('judul', 'Daftar Produk')

@section('konten')
  <a href="{{ route('produk.create') }}">+ Tambah Produk</a>

  @if (session('sukses'))
    <p style="color:green">{{ session('sukses') }}</p>
  @endif

  <table border="1" cellpadding="6">
    <tr><th>Kode</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
    @forelse ($produk as $p)
      <tr>
        <td>{{ $p->kode }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->kategori }}</td>
        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
        <td>
          @if ($p->stok == 0)
            <span style="color:red">{{ $p->stok }}</span>
          @else
            {{ $p->stok }}
          @endif
        </td>
        <td>
          <a href="{{ route('produk.show', $p) }}">Detail</a>
          <a href="{{ route('produk.edit', $p) }}">Ubah</a>
          <form method="POST" action="{{ route('produk.destroy', $p) }}"
                style="display:inline"
                onsubmit="return confirm('Hapus produk ini?')">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="6">Belum ada data produk.</td></tr>
    @endforelse
  </table>

  {{ $produk->links() }}
@endsection