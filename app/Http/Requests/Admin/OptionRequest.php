<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:100',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            //'name' => $this->input('name'),
            'created_at' => $this->input('created_at') ? $_POST['created_at'] : time(),
            'updated_at' => $this->input('updated_at') ? $_POST['updated_at'] : time(),
        ]);
    }
}
