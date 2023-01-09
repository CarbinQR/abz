<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class BaseApiFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            "success" => false,
            "message" => "Validation failed",
            'fails' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    abstract public function authorize();

    abstract public function rules();
}
