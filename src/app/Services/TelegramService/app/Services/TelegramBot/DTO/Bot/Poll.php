<?php

namespace TelegramBot\Services\TelegramBot\DTO\Bot;

use TelegramBot\Services\TelegramBot\DTO\Message\MessageEntity;

class Poll
{
    public function __construct(
        public string  $id,
        public string  $question,
        /** @var PollOption[] $options */
        public array   $options,
        public int     $totalVoterCount,
        public bool    $isClosed,
        public bool    $isAnonymous,
        public string  $type,
        public bool    $allowsMultipleAnswers,
        public ?int    $correctOptionId,
        public ?string $explanation,
        /** @var MessageEntity[] $explanationEntities */
        public ?array  $explanationEntities,
        public ?int    $openPeriod,
        public ?int    $closeDate
    )
    {
    }

    public static function makeFromArray(array $poll): self
    {
        return new self(
            $poll['id'],
            $poll['question'],
            isset($poll['options']) ? PollOption::makeMultiplesFromArray($poll['options']) : null,
            $poll['total_voter_count'],
            $poll['is_closed'],
            $poll['is_anonymous'],
            $poll['type'],
            $poll['allows_multiple_answers'],
            $poll['correct_option_id'] ?? null,
            $poll['explanation'] ?? null,
            isset($poll['explanation_entities']) ? MessageEntity::makeMultiplesFromArray($poll['explanation_entities']) : null,
            $poll['open_period'] ?? null,
            $poll['close_date'] ?? null,
        );
    }
}