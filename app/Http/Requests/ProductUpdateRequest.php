<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'image' => 'nullable',
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'attributeValue' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'store' => 'required',
            'availability' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'qty.required' => 'The quantity field is required.',
            'attributeValue.required' => 'The attribute value field is required.',
        ];
    }
}
