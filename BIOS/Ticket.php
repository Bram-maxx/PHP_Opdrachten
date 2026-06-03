<?php
declare(strict_types=1);

class Ticket
{
    public function __construct(
        public readonly Voorstelling $voorstelling,
        public readonly string $naam,
        public readonly int $ticketnummer
    ) {
    }

    public function getPrijs(): float
    {
        return $this->voorstelling->ticketprijs;
    }

    public function getBevestiging(): string
    {
        $prijs = number_format($this->getPrijs(), 2);

        return
            "Ticket #{$this->ticketnummer} | " .
            "{$this->voorstelling->film->titel} | " .
            "{$this->voorstelling->zaal->getZaalnaam()} | " .
            "{$this->voorstelling->datum} {$this->voorstelling->tijd} | " .
            "EUR {$prijs} | Op naam van: {$this->naam}";
    }
}