<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4', 'max:30'],
            'email' => 'required|email|unique',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'adresse' => 'bail|required|string|min:5|max:100',
            'telephone' => 'bail|required|string|min:10|max:10',
            'type' => 'bail|required|in:acquereur,particulier,pro',
            'status' => 'boolean'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'password' => password_hash($this->input('password'), 'bcrypt'),
            'password_confirmation' => $this->input('password_confirmation'),
            'adresse' => $this->input('adresse'),
            'telephone' => $this->input('telephone'),
            'type' => $this->input('type'),
            'status' => $this->input('status')
        ]);
    }
}
