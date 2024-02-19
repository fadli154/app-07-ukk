<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
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
            'user_id' => 'required',
            'buku_id' => 'required',
            'jumlah_pinjam' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Peminjam buku tidak boleh kosong.',
            'buku_id.required' => 'Buku yang ingin dipinjam tidak boleh kosong.',
            'jumlah_pinjam.required' => 'Stok buku tidak boleh kosong.',
        ];
    }
}
