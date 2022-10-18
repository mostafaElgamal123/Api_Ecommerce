<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'name'                =>'|max:150',
            'min_price'           =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'max_price'           =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'offer'               =>'|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'category_id'         =>'|max:250',
        ];
    }
}
