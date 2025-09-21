<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        'full_name' => 'required|string|max:255',
        'job_title' => 'required|string|max:255',
        'about_me'  => 'nullable|string',
        'email'     => 'nullable|email',
        'phone'     => 'nullable|string|max:20',
        'address'   => 'nullable|string|max:255',
        'avatar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'age'       => 'nullable|string|max:3',
        'marital'   => 'nullable|string|max:50',
        'military'  => 'nullable|string|max:50',
        ];
    }
}
