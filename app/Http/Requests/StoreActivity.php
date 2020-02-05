<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivity extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'type_id' => "required|exists:App\Type,id",
            'paid_at' => "required|date",
            'amount' => "required|numeric|between:1,1000000.00",
            'confirmation' => "nullable|string",
            'info' => "nullable|string",
            'bill_id' => "nullable|numeric",
            'method_id' => "required|exists:App\Method,id"
        ];
    }
}
