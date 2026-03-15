<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class WidgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'theme'=>'string',
            'text'=>'string',

            'customer_name'=>'string',
            'phone' => 'string|required|regex:/^\+[1-9]\d{1,14}$/',
            'email'=>'string|required',
            'image' => 'image|required|max:2048', 

        ];
    }
    
    public function messages()
    {
        return [
            'phone.regex' => 'Номер телефона должен быть в формате E.164 (например, +14155552671).',
            'email.required' => 'Email обязателен для заполнения.',
            'phone.required' => 'Телефон обязателен для заполнения.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Днанные введены неверно'
        ], 422));
    }
}
