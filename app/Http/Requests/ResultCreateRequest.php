<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultCreateRequest extends FormRequest
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
            'milliseconds' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'milliseconds.required' => 'Значение результата в миллисекундах не может быть пустым',
            'milliseconds.integer' => 'Значение должно быть цифрой',
        ];
    }
}
