<?php

namespace App\Http\Requests\auth;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisteringRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'password' => [
                'required',
                'string',
                'min:8',
                'max:100',
            ],
            'role' => [
                'required',
                Rule ::in([
                    UserRoleEnum::APPLICANT,
                    UserRoleEnum::HR,
                ])
            ]
        ];
    }
}
