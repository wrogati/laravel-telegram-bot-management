<?php

namespace TelegramBot\User\Presentation\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BotResource extends JsonResource
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->_id,
        ];
    }
}
