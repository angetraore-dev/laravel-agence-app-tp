<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaisonRequest extends FormRequest
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
    public static function rules(): array
    {
        return [
            'nb_etages' => 'required|numeric|min:0|max:50',
            'jardin' => 'bail|boolean',
            'garage' => 'bail|boolean',
            'property_id' => 'bail|exists:properties,id'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'created_at' => $this->input('created_at') ?: time(),
           'updated_at' => $this->input('updated_at') ?: time()
        ]);
    }
}
