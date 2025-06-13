<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AppartementRequest extends FormRequest
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
            'floor' => 'bail|numeric|min:1|max:100|required',
            'ascenceur' => 'bail|boolean',
            'balcon' => 'bail|boolean|required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'bien_id' => $this->input('bien'),
            'floor' => $this->input('floor'),
            'ascenceur' => $this->input('ascenceur') ?:false,
            'balcon' => $this->input('balcon') ?: false,
            'created_at' => $this->input('created_at') ?: time(),
            'updated_at' => $this->input('updated_at') ?: time(),
        ]);
    }
}
