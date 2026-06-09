<?php
declare(strict_types=1);

require_once 'Ticket.php';

class Voorstelling
{
    private array $tickets = [];

    public function __construct(
        public readonly Film $film,
        public readonly Zaal $zaal,
        public readonly string $datum,
        public readonly string $tijd,
        public readonly float $ticketprijs
    ) {}

    public function verkoopTicket(string $naam): Ticket
    {
        if ($this->isVol()) {
            throw new RuntimeException(
                "Zaal is vol — geen tickets meer beschikbaar."
            );
        }

        $ticketnummer = count($this->tickets) + 1;

        $ticket = new Ticket(
            $this,
            $naam,
            $ticketnummer
        );

        $this->tickets[] = $ticket;

        return $ticket;
    }

    public function getResterendePlaatsen(): int
    {
        return $this->zaal->aantalStoelen - count($this->tickets);
    }

    public function isVol(): bool
    {
        return $this->getResterendePlaatsen() <= 0;
    }

    public function getInkomsten(): float
    {
        return count($this->tickets) * $this->ticketprijs;
    }

    public function getTicketAantal(): int
    {
        return count($this->tickets);
    }
}