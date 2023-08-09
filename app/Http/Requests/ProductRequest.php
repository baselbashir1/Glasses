<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'brand_en' => ['required', 'string'],
            'brand_ar' => ['required', 'string'],
            'type' => 'required',
            'image' => ['nullable', 'image'],
            'color_en' => ['nullable', 'string'],
            'color_ar' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'lenses_grade' => 'nullable',
            'lenses_description' => 'nullable'
        ];
    }
}
