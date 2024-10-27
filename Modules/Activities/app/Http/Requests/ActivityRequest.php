<?php

namespace Modules\Activities\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'customer' => 'required|integer|exists:customers,id',
            'type' => 'required|integer|exists:activity_types,id',
            'duration' => 'required|date_format:H:i',
            'description' => 'required|string|between:3,300',
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
