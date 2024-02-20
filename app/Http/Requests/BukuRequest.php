<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => 'nullable|max:20',
            'judul' => 'required|max:60',
            'penulis' => 'required|max:85',
            'penerbit' => 'required|max:80',
            'sinopsis' => 'required',
            'tahun_terbit' => 'required',
            'stok_buku' => 'required',
            'kategori_id' => 'required',
            'sampul_buku' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'isbn.max' => 'Isbn tidak boleh lebih dari 20.',

            'judul.required' => 'Judul tidak boleh kosong.',
            'judul.max' => 'Judul tidak boleh lebih dari 60.',

            'penulis.required' => 'Penulis tidak boleh kosong.',
            'penulis.max' => 'Penulis tidak boleh lebih dari 85.',

            'penerbit.required' => 'Penerbit tidak boleh kosong.',
            'penerbit.max' => 'Penerbit tidak boleh lebih dari 80.',

            'tahun_terbit.required' => 'Tahun terbit tidak boleh kosong.',
            'stok_buku.required' => 'Stok buku tidak boleh kosong.',
            'sinopsis.required' => 'Sinopsis buku tidak boleh kosong.',
            'kategori_id.required' => 'Kategori buku tidak boleh kosong.',

            'sampul_buku.required' => 'Sampul buku tidak boleh kosong.',
            'sampul_buku.image' => 'Harap masukkan foto.',
            'sampul_buku.mimes' => 'Masukkan foto dengan format :values',
            'sampul_buku.max' => 'Foto tidak boleh lebih dari 5MB.',
        ];
    }
}