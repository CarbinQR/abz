<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseApiFormRequest;

class UserGetPaginateListRequest extends BaseApiFormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'page' => 'nullable|integer|min:1',
            'offset' => 'nullable|integer|min:0',
            'count' => 'nullable|integer|min:1|max:100',
        ];
    }
}
