<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniqueUserNameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users|string|max:255',
            'email' => 'required|unique:users|email|string|max:255',
            'password' => 'required|string|confirmed|min:8'
        ];
    }
}
