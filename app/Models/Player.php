<?php

namespace App\Models;

class Player
{
    public function __construct(
        public readonly string $name,
        public int $credits
    ) {}

    public function winsAgainst(Player $opponent): void
    {
        $this->credits++;
        $opponent->credits--;
    }

    public function losesTo(Player $opponent): void
    {
        $this->credits--;
        $opponent->credits++;
    }

    public function bankrupt(): bool
    {
        return $this->credits === 0;
    }

    public function oddsOfWinningAgainst(Player $opponent): float
    {
        $calculator = new OddsCalculator($this->credits, $opponent->credits);

        return number_format($calculator->calculate(), 2);
    }
}