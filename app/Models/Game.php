<?php

namespace App\Models;

class Game
{
    public ?Player $loser = null;
    public ?Player $winner = null;

    public function __construct(
        public readonly Player $player1,
        public readonly Player $player2
    ) { }

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
