<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            //

            'name'=>'required|string',
            'image'=>'required|mimes:png,jpg',//add extionsos for pdf or any thing else also you can add the size you want 
            'category_id'=>'required|exists:categories,id',
            'description'=>'required'
        ];
    }
}
