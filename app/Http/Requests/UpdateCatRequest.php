<?php

namespace App\Http\Requests;

use App\Enums\CatGenderEnum;
use App\Enums\CatStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\ValidationException;

class UpdateCatRequest extends FormRequest
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
            'shelter_id' => 'sometimes|required|exists:shelters,id',
            'name' => 'sometimes|required|max:255',
            'chip_number' => 'sometimes|required|max:255',
            'gender' => [
                'sometimes',
                'required',
                new Enum(CatGenderEnum::class),
            ],
            'birthday' => 'sometimes|date_format:Y-m-d',
            'status' => [
                'sometimes',
                'required',
                new Enum(CatStatusEnum::class),
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
