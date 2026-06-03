<?php
declare(strict_types=1);

class Zaal
{
    public function __construct(
        public readonly int $nummer,
        public readonly int $aantalStoelen,
        public readonly bool $isIMAX
    ) {
    }

    public function getZaalnaam(): string
    {
        if ($this->isIMAX) {
            return "IMAX Zaal {$this->nummer}";
        }

        return "Zaal {$this->nummer}";
    }
}