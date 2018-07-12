<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UsersRequest extends FormRequest
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
            'name'=>'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email'=>'required|email',
            'introduction'=>'max:80',
            'avatar'=>'mimes:jpeg,bmp,png,gif|dimension:min_width=300,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'Please enter another username',
            'name.required'=>'the username can not be null',
        ];
    }
}
