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
            'bien_id' => 'bail|exists:bien_immobiliers,id',
            'nb_etages' => 'bail|numeric|min:0|max:100',
            'jardin' => 'bail|boolean',
            'garage' => 'bail|boolean'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'bien_id' => $this->input('bien'),
           'nb_etages' => $this->input('nb_etages'),
           'jardin' => $this->input('jardin') ?: false,
           'garage' => $this->input('garage') ?: false,
           'created_at' => $this->input('created_at') ?: time(),
           'updated_at' => $this->input('updated_at') ?: time()
        ]);
    }
}
