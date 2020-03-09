<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ];
    }
    public function messages(){
        return [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Phải đúng định dạng email',
            'password.required'=>'Không được để trống mật khẩu!',
            'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'password.max'=>'Mật khẩu bé hơn 20 ký tự'
        ];
    }
}
