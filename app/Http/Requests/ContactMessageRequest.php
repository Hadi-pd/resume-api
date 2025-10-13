<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
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

        $isDebug = config('app.debug');

        return [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
            'company' => 'max:0', // کمپانی باید خالی باشد 
            'g-recaptcha-response' => $isDebug ? 'nullable' : 'required'
        ];
    }

    public function messages()
    {
        return [
            'company.max' => 'Spam detected!',
        ];
    }
}
