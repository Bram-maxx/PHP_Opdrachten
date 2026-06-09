<?php
declare(strict_types=1);

class Ticket
{
    public function __construct(
        public readonly Voorstelling $voorstelling,
        public readonly string $naam,
        public readonly int $ticketnummer
    ) {}

    public function getPrijs(): float
    {
        return $this->voorstelling->ticketprijs;
    }

    public function getBevestiging(): string
    {
        return sprintf(
            "Ticket #%d | %s | %s | %s %s | EUR %.2f | Op naam van: %s",
            $this->ticketnummer,
            $this->voorstelling->film->titel,
            $this->voorstelling->zaal->getZaalnaam(),
            $this->voorstelling->datum,
            $this->voorstelling->tijd,
            $this->getPrijs(),
            $this->naam
        );
    }
}