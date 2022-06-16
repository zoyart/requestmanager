<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
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
            'name' => 'required|max:255',
            'article_number' => 'max:255',
            'count' => 'required|numeric',
            'price' => 'numeric',
            'cost_price' => 'numeric',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.max' => 'Максимально допустимое число символов - 255',

            'count.required' => 'Это поле обязательно для заполнения',
            'count.numeric' => 'Это поле обязательно для заполнения',

            'price.required' => 'Это поле обязательно для заполнения',
            'price.numeric' => 'Это значение должно быть числом',

            'cost_price.required' => 'Это поле обязательно для заполнения',
            'cost_price.numeric' => 'Это значение должно быть числом',
        ];
    }
}
