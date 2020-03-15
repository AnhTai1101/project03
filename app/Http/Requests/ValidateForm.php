<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateForm extends FormRequest
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
            'name'=>'required',
            'content'=>'required',
            'description'=>'required',
            'price_unit'=>'required|max:8',
            'quantity'=>'required',
            'file'=>'image|max:2024',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'name.required'=>'Không được để trống'
    //     ];
    // }
}
