<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|min:4|max:100',
            'description' => 'bail|required',
            'surface' => ['required', 'integer', 'min:10'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'price' => 'bail|required|between:1,10000000000|numeric',
            'city' => 'bail|required|alpha',
            'adress' => ['required'],
            'postal_code' => ['required', 'min:3'],
            'sold' => 'bail|required|boolean',
            'options' => 'bail|array|exists:options,id|required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'created_at' => $this->input('created_at') ? $_POST['created_at'] : time(),
            'updated_at' => $this->input('updated_at') ? $_POST['updated_at'] : time(),
            'title' => $this->input('title') ?? $_POST['title'],
            'description' => $this->input('description') ?? isset($_POST['description']),
            'surface' => $this->input('surface') ?? isset($_POST['surface']),
            'rooms' => $this->input('rooms') ?? isset($_POST['rooms']),
            'bedrooms' => $this->input('bedrooms') ?? isset($_POST['bedrooms']),
            'floor' => $this->input('floor') ?? isset($_POST['floor']),
            'price' => $this->input('price') ?? isset($_POST['price']),
            'city' => $this->input('city') ?? isset($_POST['city']),
            'adress' => $this->input('adress') ?? isset($_POST['adress']),
            'postal_code' => $this->input('postal_code') ?? isset($_POST['postal_code']),
            'sold' => $this->input('sold'),
            //'options' => $this->input('options')
        ]);
    }
}
