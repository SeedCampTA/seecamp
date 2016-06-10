<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreProfileRequest extends Request
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'image' => 'image:jpg,jpeg,png|max:4000',
        ];
    }
}
