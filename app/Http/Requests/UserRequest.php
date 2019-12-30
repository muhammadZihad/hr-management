<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users',
            'department' => 'required',
            'designation' => 'required',
            'role' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'id_no' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'image' => 'required'
        ];
    }
}