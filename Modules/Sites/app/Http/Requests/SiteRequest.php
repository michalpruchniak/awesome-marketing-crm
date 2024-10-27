<?php

namespace Modules\Sites\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'customer' => 'required|exists:customers,id',
            'url' => 'required|regex:/^(https?:\/\/)([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
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
