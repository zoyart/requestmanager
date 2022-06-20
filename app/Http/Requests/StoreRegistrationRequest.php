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
            'companyName' => 'required|max:100',
            'name' => 'required|max:45',
            'surname' => 'required|max:45',
            'email' => 'required|email|unique:users|unique:companies|max:45',
            'password' => 'required|confirmed|min:8|max:45',
            'g-recaptcha-response' => 'required|captcha',
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
            'g-recaptcha-response.required' => 'Капча обязательна',
            'g-recaptcha-response.captcha' => 'Ошибка капчи',
        ];
    }
}
