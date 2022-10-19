<?php

namespace App\Http\Requests\Api;

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
            'name'                =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:100000',
            'image'               =>'image|mimes:webp|max:300',
            'price'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'available'           =>'required|',
            'category_id'         =>'required|',
        ];
    }
}