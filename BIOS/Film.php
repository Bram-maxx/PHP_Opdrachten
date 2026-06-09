<?php
declare(strict_types=1);

class Film
{
    public function __construct(
        public readonly string $titel,
        public readonly string $regisseur,
        public readonly int $duurInMinuten,
        public readonly int $leeftijdsgrens
    ) {}

    public function getDuurAlsString(): string
    {
        $uren = intdiv($this->duurInMinuten, 60);
        $minuten = $this->duurInMinuten % 60;

        return "{$uren} uur en {$minuten} minuten";
    }

    public function isGeschiktVoor(int $leeftijd): bool
    {
        return $leeftijd >= $this->leeftijdsgrens;
    }

    public function getSamenvatting(): string
    {
        return "{$this->titel} (regisseur: {$this->regisseur}) | {$this->duurInMinuten} min | Leeftijd: {$this->leeftijdsgrens}+";
    }
}