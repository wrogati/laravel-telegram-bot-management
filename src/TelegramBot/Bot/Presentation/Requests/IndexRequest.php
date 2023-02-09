<?php

namespace TelegramBot\Bot\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['nullable', 'numeric', 'min:1'],
            'per_page' => ['nullable', 'numeric', 'min:1'],
            'order_by_column' => ['nullable', 'string'],
            'order_by_direction' => ['nullable', 'string', 'in:asc,desc']
        ];
    }
}
