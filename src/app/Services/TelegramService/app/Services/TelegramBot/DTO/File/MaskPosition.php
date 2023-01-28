<?php

namespace TelegramBot\Services\TelegramBot\DTO\File;

class MaskPosition
{
    public function __construct(
        public readonly string $point,
        public readonly float  $xShift,
        public readonly float  $yShift,
        public readonly float  $scale
    )
    {
    }

    public static function makeFromArray(array $maskPosition): self
    {
        return new self(
            $maskPosition['point'],
            $maskPosition['x_shift'],
            $maskPosition['y_shift'],
            $maskPosition['scale'],
        );
    }
}