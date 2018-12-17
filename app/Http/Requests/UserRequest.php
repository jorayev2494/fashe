<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        // dd($user);
        return [
            "name" => "required|string|max:100",
            "lastname" => "required|string|max:100",
            'email' => 'required|string|email|max:255',
            "role"  => "required|numeric",
            'password' => 'required|confirmed|string|min:6|max:50',
            "site" => "required|url|max:20",
            "location" => "string|max:255",
            "profession" => "string|max:150",
            "avatar" => "image",
        ];
    }
}
