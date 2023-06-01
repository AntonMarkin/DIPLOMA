<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'surname' => 'required',
            'patronymic' => '',
            'phone_number' => 'required|min:11|max:12',
            'post_id' => 'required|integer',
            'office_id' => 'required|integer',
            'login' => 'required|max:255',
            'password' => 'string|min:6',
            'role' => ''
        ];
    }
}
