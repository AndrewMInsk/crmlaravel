<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FilterRequest extends FormRequest
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
            'theme' => 'nullable|string',
            'text' => 'nullable|string',
            'customer_name' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'nullable|string',
            'date_from' => 'nullable|string',
        ];
    }
    

}
