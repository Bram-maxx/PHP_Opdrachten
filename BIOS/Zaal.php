<?php
declare(strict_types=1);

class Zaal
{
    public function __construct(
        public readonly int $nummer,
        public readonly int $aantalStoelen,
        public readonly bool $isIMAX
    ) {}

    public function getZaalnaam(): string
    {
        return $this->isIMAX
            ? "IMAX Zaal {$this->nummer}"
            : "Zaal {$this->nummer}";
    }
}