<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPropertyRequest extends FormRequest
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
            'price' => 'numeric|between:1,10000000000000|nullable',
            'surface' => 'numeric|min:13|max:9000|nullable',
            'rooms' => 'numeric|min:0|max:20|nullable',
            'bedrooms' => 'numeric|min:0|max:20|nullable',
            'city' => 'string|max:200|nullable',
            'title' => 'string|nullable',
        ];
    }
}
