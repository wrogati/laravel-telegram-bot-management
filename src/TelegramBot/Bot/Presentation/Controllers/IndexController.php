<?php

namespace TelegramBot\Bot\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use TelegramBot\Bot\Application\Index;
use TelegramBot\Bot\Presentation\Requests\IndexRequest;
use TelegramBot\User\Presentation\Resources\BotResource;

class IndexController extends Controller
{
    public function __construct(private readonly Index $index)
    {
    }

    public function __invoke(IndexRequest $request): AnonymousResourceCollection
    {
        return BotResource::collection($this->index->handle($request->validated()));
    }
}
