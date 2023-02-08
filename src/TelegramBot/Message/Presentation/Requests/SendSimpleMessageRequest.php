<?php

namespace TelegramBot\Message\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendSimpleMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'chat_id' => ['required', 'string'],
            'text' => ['required', 'string', 'min:1']
        ];
    }
}
