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

}
