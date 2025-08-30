<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //The validation rules for the login request password parameter
        //7 to 21 characters, at least one letter, one number and one symbol.
        $pass_rules = Password::min(7)
                                ->max(21);
        return [
            "email"    => ["required", "string", "email:rfc", "max:254"],
            "password" => ["required", "string", $pass_rules]
        ];
    }
}
