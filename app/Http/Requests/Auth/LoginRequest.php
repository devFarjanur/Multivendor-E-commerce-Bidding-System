<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Allow all users to make this request
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],  // Ensure email is required, a string, and a valid email
            'password' => ['required', 'string'],         // Ensure password is required and a string
        ];
    }

    /**
     * Custom error messages if validation fails.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a valid string.',
        ];
    }

    /**
     * Determine if the user is authenticated before they can submit the request.
     *
     * @return bool
     */
    public function isUserAuthenticated(): bool
    {
        return auth()->check();
    }
}
