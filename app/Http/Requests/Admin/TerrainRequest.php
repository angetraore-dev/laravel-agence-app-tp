<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bien_id' => 'bail|exists:bien_immobiliers,id|required',
            'constructible' => 'bail|required|boolean',
            'zone' => 'bail|min:2|max:100|required',
        ];
    }

    protected function prepareForValidation()
    {
        //'bien_id' => $this->input('bien'),
        //           'constructible' => $this->input('constructible'),
        //           'zone' => $this->input('zone'),
        $this->merge([
            'created_at' => $this->input('created_at') ?: time(),
           'updated_at' => $this->input('updated_at') ?: time(),
        ]);
    }
}
