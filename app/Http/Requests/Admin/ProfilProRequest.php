<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class ProfilProRequest extends FormRequest
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
    #[ArrayShape(['agence' => "string", 'rccm' => "string[]", 'cc' => "string", 'abonnement' => "string", 'user_id' => "string"])]
    public function rules(): array
    {
        return [
            'agence' => 'bail|required|string|min:2|max:250',
            'rccm' => ['required', 'string', 'min:2', 'max:250'],
            'cc' => 'bail|required|string|min:2|max:250',
            'abonnement' => 'bail|required|string|min:4|max:100',
            'user_id' => 'required|exists:users,id'
        ];
    }

}
