<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('user');
        return [
            'name' => 'required',
            'email' => ['required', 'string', 'email'],
            'phone' => Rule::unique('users', 'phone')->ignore($id, 'id'),
            'password' => ['required', 'string'],
            'image' => 'nullable'
        ];
    }
}
