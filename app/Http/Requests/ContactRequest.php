<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        return [
            'email' => 'required|email|unique:subscribers,email',
            'name' => 'required|string|max:255', // Assuming 'name' should be a required string with a maximum length of 255 characters.
            'subject' => 'required ', // Assuming 'subject' is also a required string, max length 255.
            'message' => 'required  ', //
        ];
    }
}
