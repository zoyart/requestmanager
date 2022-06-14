<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
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
            'companyName' => 'required',
            'name' => 'required|max:10',
            'surname' => 'required',
            'email' => 'required|email|unique:users|unique:companies',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'companyName.required' => 'Это поле обязательно к заполнению.',
            'name.required' => 'Это поле обязательно к заполнению.',
            'email.required' => 'Это поле обязательно к заполнению.',
            'surname.required' => 'Это поле обязательно к заполнению.',
            'email.unique' => 'Этот email уже используеться в системе.',
            'password.required' => 'Это поле обязательно к заполнению.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Подтвердите пароль',
        ];
    }
}
