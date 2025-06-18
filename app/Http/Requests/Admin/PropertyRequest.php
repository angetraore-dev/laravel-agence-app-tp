<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => 'required|unique:properties|max:100',
            'type' => 'required|in:maison,appartement,terrain',
            'surface' => 'required|integer|min:10',
            'rooms' => 'required|integer|max:100',
            'bedrooms' => ['required', 'integer', 'min:0'],
            'price' => 'numeric|min:1|required',
            'description' => 'bail|required',
            'city' => 'required|alpha',
            'adress' => 'required',
            'status' => 'required|in:complete,avaible,processing',
            'options' => 'array|exists:options,id|required'
            //'sold' => 'bail|required|boolean', 'floor' => ['required', 'integer', 'min:0'], 'postal_code' => ['required', 'min:3'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'created_at' => $this->input('created_at') ? $_POST['created_at'] : time(),
            'updated_at' => $this->input('updated_at') ? $_POST['updated_at'] : time()
        ]);
    }
}
