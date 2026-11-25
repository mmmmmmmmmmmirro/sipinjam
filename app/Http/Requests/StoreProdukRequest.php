<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProdukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('produk')?->id;

        return [
            'kode'     => ['required','string','max:20', Rule::unique('produks','kode')->ignore($id)],
            'nama'     => ['required','string','min:3','max:100'],
            'kategori' => ['required','string','max:50'],
            'harga'    => ['required','integer','min:0'],
            'stok'     => ['required','integer','min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required'     => 'Kode produk wajib diisi.',
            'kode.unique'       => 'Kode produk sudah dipakai.',
            'nama.required'     => 'Nama produk wajib diisi.',
            'nama.min'          => 'Nama produk minimal 3 karakter.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga.required'    => 'Harga wajib diisi.',
            'harga.integer'     => 'Harga harus berupa angka bulat.',
            'harga.min'         => 'Harga tidak boleh negatif.',
            'stok.required'     => 'Stok wajib diisi.',
            'stok.min'          => 'Stok tidak boleh negatif.',
        ];
    }
}