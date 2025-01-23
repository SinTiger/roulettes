<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplyRequest extends FormRequest
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
            'supplier_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required' => 'Поле обязательно для заполнения',
            'product_id.required' => 'Поле обязательно для заполнения',
            'quantity.required' => 'Поле обязательно для заполнения',
            'price.required' => 'Поле обязательно для заполнения',
            'date.required' => 'Поле обязательно для заполнения',

            'supplier_id.integer' => 'Поле должно быть числом',
            'product_id.integer' => 'Поле должно быть числом',
            'quantity.integer' => 'Поле должно быть числом',
            'price.integer' => 'Поле должно быть числом',
            'date.date' => 'Поле должно быть датой',
        ];
    }
}
