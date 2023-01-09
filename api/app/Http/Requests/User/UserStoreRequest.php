<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiFormRequest;
use App\Rules\EmailRfcRule;

class UserStoreRequest extends BaseApiFormRequest
{
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
            'name' => 'required|string|min:2|max:60',
            'password' => 'min:3|max:60',
            'password_confirmation' => 'required_with:password|same:password|min:3|max:60',
            'email' => [
                'required',
                'string',
                'min:2',
                'max:100',
                new EmailRfcRule()
            ],
            'phone' => 'required|string|starts_with:+380',
            'position_id' => 'required|integer|exists:positions,id',
            'file' => 'required|image|mimes:jpg,jpeg|max:5120|dimensions:min_width=70,min_height=70',
            'token' => 'required|string',
        ];
    }
}
