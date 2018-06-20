<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'slcCategory'=>'required',
            'txtName'=>'required',
            'txtPrice'=>'required',
            'fImages'=>'required|image',
        ];
    }
    public function message()
    {
        return [
            'slCategory.required'=>'Choose a category for product',
            'txtName.required'=>'Enter name for product',
            'txtPrice.required'=>'Enter price for product',
            'fImages.required'=>'Choose image for product',
            'fImages.image'=>'File is not image',
        ];
    }
}
