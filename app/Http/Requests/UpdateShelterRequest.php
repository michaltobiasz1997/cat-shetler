<?php

namespace App\Http\Requests;

use App\Enums\ShelterStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class UpdateShelterRequest extends FormRequest
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
            'name' => 'sometimes|required|max:255',
            'street' => 'sometimes|required|max:255',
            'house' => 'sometimes|required|max:255',
            'zipcode' => 'sometimes|required|max:255',
            'city' => 'sometimes|required|max:255',
            'status' => [
                'sometimes',
                'required',
                new Enum(ShelterStatusEnum::class),
            ],
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
