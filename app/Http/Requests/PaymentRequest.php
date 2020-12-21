<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'email' => 'required|exists:users',
            'address' => 'required|min:6|max:50',
            'city' => 'required|min:6|max:40',
            'province' => 'required|min:6|max:40',
            'postal-code' => 'required|numeric',
            'mobile' => 'required|numeric',
            'document-type' => 'required|in:C.C',
            'document-number' => 'required|numeric'
        ];
    }
}
