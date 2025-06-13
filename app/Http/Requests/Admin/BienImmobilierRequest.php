<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BienImmobilierRequest extends FormRequest
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
            'title' => 'required|min:4|unique:bien_immobiliers|max:100',
            'type' => 'required|in:maison,appartement,terrain',
            'surface' => 'required|integer|min:10',
            'rooms' => ['required', 'integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:1'],
            'city' => 'required|max:100',
            'adresse' => 'required|max:250',
            'price' => 'required|numeric|min:1|max:9999999999',
            'description' => 'required|max:250',
            'sold' => 'required|in:complete,avaible,processing',
            'user_id' => 'required|exists:users,id',
            'specificities' => 'required|exists:specificities,id'//array
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => Str::slug($this->input('title')),
            'type' => $this->input('type'),
            'surface' => $this->input('surface'),
            'rooms' => $this->input('rooms'),
            'bedrooms' => $this->input('bedrooms'),
            'city' => $this->input('city'),
            'adresse' => $this->input('adresse'),
            'price' => $this->input('price'),
            'description' => $this->input('description'),
            'sold' => $this->input('sold'),
            'user_id' => $this->input('user_id') ?? 1,
            'created_at' => $this->input('created_at') ?: time(),
            'updated_at' => $this->input('updated_at') ?: time(),
            //Auth::getUser() ? $this->getUser() :
        ]);
    }
}
