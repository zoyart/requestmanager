<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone_number' => 'max:15',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно к заполнению.',
            'address.required' => 'Это поле обязательно к заполнению.',
            'email.required' => 'Это поле обязательно к заполнению.',
            'email.email' => 'Email введён некорректно.',
            'phone_number.max' => 'номер телефона должен содержать максимум 15 символов.',
        ];
    }
}
