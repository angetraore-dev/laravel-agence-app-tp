<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'agence' => 'bail|required|string|min:2|max:250',
            'rccm' => ['required', 'string', 'min:2', 'max:250'],
            'cc' => 'bail|required|string|min:2|max:250',
            'abonnement' => 'bail|required|string|min:4|max:100',
            'user_id' => 'bail|exists:users,id|required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'agence' => $this->input('agence'),
            'rccm' => $this->input('rccm'),
            'cc' => $this->input('cc'),
            'abonnement' => $this->input('abonnement'),
            'user_id' => $this->input('user') ? Auth::getUser() : $this->getUser(),
            'created_at' => $this->input('created_at') ?: time(),
            'updated_at' => $this->input('updated_at') ?: time(),
        ]);
    }
}
