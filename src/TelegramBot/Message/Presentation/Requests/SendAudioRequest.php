<?php

namespace TelegramBot\Message\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendAudioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'chat_id' => ['required', 'string'],
            'audio.txt' => ['required']
        ];
    }
}
