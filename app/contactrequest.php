<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactformRequest extends Request
{
    public function authorize()
    {
        return true;
    }
public function rules()
    {
        return [
            'first_name' =>'required',
            // 'last_name'=>'required',
            'url'=>'url',
            
            'email'=>'unique:users,email|email',
            // 'password'=>'min:6|confirmed',
            // 'password_confirmation'=>'min:6'
            
            
        ];
    }
}
