<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtUser'=>'required',
            'txtPass'=>'required',
            'txtRePass'=>'required|same:txtPass',
            'txtEmail'=>'required',
            'rdoLevel'=>'required',
        ];
    }
    public function message()
    {
        return [
            'txtUser.required'=>'Username not empty',
            'txtPass.required'=>'Pass not empty',
            'txtRePass.required'=>'Repass not empty',
            'txtRePass.same'=>'Repass not same',
            'txtEmail.required'=>'Email not empty',
            
            'rdoLevel.required'=>'Level not empty',
        ];
    }
}
