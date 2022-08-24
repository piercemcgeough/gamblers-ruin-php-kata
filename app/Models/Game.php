<?php

namespace App\Models;

class Game
{
    private int $flips = 0;

    public function __construct(
        public readonly Player $player1,
        public readonly Player $player2
    ) { }

    public function info(): string
    {
        $output = $this->player1->name . " odds of winning: " . $this->player1->oddsOfWinningAgainst($this->player2) . "%" . PHP_EOL;
        $output .= $this->player2->name . " odds of winning: " . $this->player2->oddsOfWinningAgainst($this->player1) . "%";
        return $output;
    }

    public function incrementFlips()
    {
        $this->flips++;
    }

    public function flips()
    {
        return $this->flips;
    }

    public function winner(): Player|null
    {
        if ($this->player1->bankrupt()) {
            return $this->player2;
        }

        if ($this->player2->bankrupt()) {
            return $this->player1;
        }

        return null;
    }
}
