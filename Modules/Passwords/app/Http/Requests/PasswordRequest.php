<?php

namespace Modules\Passwords\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Passwords\Enums\PasswordType;

class PasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'customer' => 'required|exists:customers,id',
            'name' => 'required|string|between:2,25',
            'type' => ['required', Rule::enum(PasswordType::class)],
            'host' => 'required|string|between:3,25',
            'login' => 'required|string|between:2,30',
            'password' => 'required|string|between:3,60',
            'port' => 'nullable|integer|between:1,30000',
            'notes' => 'nullable|string|max:300',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
