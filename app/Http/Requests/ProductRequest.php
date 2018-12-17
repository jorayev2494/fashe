<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "product_name"          =>  "required|min:2|max:100|unique:products,name",
            // "product_name"          =>  "required|min:2|max:100",
            // "product_photo"         =>  "required",
            "product_category"      =>  "required|integer",
            "product_size"          =>  "required|integer",
            "product_count"         =>  "required|integer",
            "product_color"         =>  "required|string|max:255",
            "product_status"        =>  "required|integer",
            "product_description"   =>  "required|min:5|max:255",
            // "product_active" => "on",
        ];
    }
}
