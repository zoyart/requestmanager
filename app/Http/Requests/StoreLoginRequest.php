<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Это поле обязательно к заполнению.',
            'email.email' => 'Email введён некорректно.',
            'password.required' => 'Это поле обязательно к заполнению.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ];
    }
}
