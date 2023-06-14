<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CreateEmployeeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'shelter_id' => 'required|exists:shelters,id',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|phone|max:20',
            'country' => 'required_with:phone|max:2',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(['errors' => (new ValidationException($validator))->errors()], 422)
        );
    }
}
