<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'product' => 'required',
            'paid_amount' => 'required',
            'remaining_amount' => 'required',
            'product_received' => 'nullable',
            'payment_status' => 'required',
            'agent' => 'required',
            'purchased_date' => 'nullable',
            'content' => 'nullable'
        ];
    }
}
