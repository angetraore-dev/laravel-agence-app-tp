<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class TerrainRequest extends FormRequest
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
     * @return array
     */
    #[ArrayShape(['constructible' => "string", 'zone' => "string", 'property_id' => "string"])]
    public static function rules(): array
    {
        return [
            'constructible' => 'bail|boolean',
            'zone' => 'required|in:agricole,rurale',
            'property_id' => 'bail|exists:properties,id'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'created_at' => $this->input('created_at') ?: time(),
           'updated_at' => $this->input('updated_at') ?: time(),
        ]);
    }
}
