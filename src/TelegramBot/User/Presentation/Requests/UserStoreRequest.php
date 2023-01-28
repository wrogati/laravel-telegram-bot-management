<?php

namespace TelegramBot\User\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; //TODO:: add permission check
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:20'],
            'last_name' => ['nullable', 'string', 'min:2', 'max:30'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'max:32']
        ];
    }
}
