<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends BaseRequest
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
            'card_number' => 'required',
            'cvc' => ['required','regex:/^\d{3}+$/'],
            'dates' => ['required','regex:/^\d{2}[\/ ]\d{2}+$/'],
            'sessionId' => 'required|exists:sessions,sessionId',
        ];
    }
}
