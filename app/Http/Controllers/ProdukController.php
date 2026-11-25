<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('kode')->paginate(10);
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(StoreProdukRequest $request)
    {
        Produk::create($request->validated());
        return redirect()->route('produk.index')
            ->with('sukses', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(StoreProdukRequest $request, Produk $produk)
    {
        $produk->update($request->validated());
        return redirect()->route('produk.index')
            ->with('sukses', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('sukses', 'Produk berhasil dihapus.');
    }
}