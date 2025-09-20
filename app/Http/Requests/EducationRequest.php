<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'degree'      => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'start_year'  => 'nullable|digits:4',
            'end_year'    => 'nullable|digits:4|after_or_equal:start_year',
            'description' => 'nullable|string',
        ];
    }
}
