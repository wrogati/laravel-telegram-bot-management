<?php

namespace TelegramBot\User\Presentation\Requests\Bot;

use Illuminate\Foundation\Http\FormRequest;

class BotStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; //TODO:: add permission check
    }

    public function rules(): array
    {
        return [
            'telegram_id' => ['required', 'string'],
        ];
    }
}
