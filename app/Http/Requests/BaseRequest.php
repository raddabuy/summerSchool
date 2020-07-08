<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{

    public function responseSuccess($data)
    {
        return [
            'success' => 'true',
            'data' => $data
        ];
    }

    public function responseError($code)
    {
        return [
            'success' => 'false',
            'error'=> [
                'code' => $code,
                'message' => constant('ERROR_'.$code . '_MESSAGE')
            ],
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'is_auth'=>'false',
                'errors' => $validator->errors()->all()
            ], 422)
        );
    }

    public function rules()
    {
        return [

        ];
    }

}
