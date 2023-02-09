<?php

namespace TelegramBot\Auth\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,filter'],
            'password' => ['required', 'string', 'min:8', 'max:32']
        ];
    }
}
