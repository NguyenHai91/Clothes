<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class CategoryRequest extends Request
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
            'txtCateName' => 'required|unique:category,name',
            'slcParent' => 'required',
        ];
    }
    public function message()
    {
        return [
            'txtCateName.required' => 'cate name not empty !', 
            'txtCateName.unique' => 'cate name exists !', 
            'slcParent.required' => 'Parent not empty',
        ];
    }
}
