<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        // Convert nomor_telpon to a numeric format
        $this->merge([
            'no_telepon' => currencyPhoneToNumeric($this->input('no_telepon')),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:85|min:3',
            'username' => 'required|max:50|min:4|unique:users,username,' . $this->input('user_id') . ',user_id',
            'email' => 'required|email|unique:users,email,' . $this->input('user_id') . ',user_id',
            'no_telepon' => 'required|min:10|max:13|unique:users,no_telepon,' . $this->input('user_id') . ',user_id',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required',
            'roles' => 'nullable',
            'status_aktif' => 'nullable',
            'alamat' => 'required|max:255|min:4',
            'password' => 'required|min:5',
            'foto_user' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max' => 'Nama tidak boleh lebih dari 85.',
            'name.min' => 'Nama tidak boleh kurang dari 3.',

            'username.required' => 'Username tidak boleh kosong.',
            'username.max' => 'Username tidak boleh lebih dari 50.',
            'username.min' => 'Username tidak boleh kurang dari 4.',
            'username.unique' => 'Masukkan username yang lain.',

            'email.required' => 'Email tidak boleh kosong.',
            'email.max' => 'Email tidak boleh lebih dari 50.',
            'email.min' => 'Email tidak boleh kurang dari 4.',
            'email.unique' => 'Masukkan email yang lain.',

            'no_telepon.required' => 'No_telepon tidak boleh kosong.',
            'no_telepon.max' => 'No_telepon tidak boleh lebih dari 13.',
            'no_telepon.min' => 'No_telepon tidak boleh kurang dari 19.',
            'no_telepon.unique' => 'Masukkan no_telepon yang lain.',

            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong.',
            'tanggal_lahir.date' => 'Masukkan format tanggal.',

            'jk.required' => 'Jenis kelamin tidak boleh kosong.',
            'roles.required' => 'Roles tidak boleh kosong.',

            'alamat.required' => 'Alamat tidak boleh kosong.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255.',
            'alamat.min' => 'Alamat tidak boleh kurang dari 4.',

            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password tidak boleh kurang dari 5.',

            'foto_user.image' => 'Harap masukkan foto.',
            'foto_user.mimes' => 'Masukkan foto dengan format :values',
            'foto_user.max' => 'Foto tidak boleh lebih dari 5MB.',
        ];
    }
}
