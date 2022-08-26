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

    public function displayStartInfo(): void
    {
        echo $this->info();
    }

    public function play()
    {
        while (true) {
            if ($this->hasWinner()) {
                break;
            }

            $headsOrTails = Coin::flip();
            $this->incrementFlips();

            $this->updateCredits($headsOrTails);
        }
    }

    public function endInfo(): string
    {
        $winner = $this->hasWinner()
            ? $this->winner()->name
            : "No winner yet";

        $output = "Winner: " . $winner . PHP_EOL;
        $output .= "Flips: " . $this->flips();

        return $output;
    }

    public function displayEndInfo(): void
    {
        echo $this->endInfo();
    }

    public function incrementFlips()
    {
        $this->flips++;
    }

    public function flips()
    {
        return $this->flips;
    }

    private function hasWinner(): bool
    {
        if ($this->player1->bankrupt()) {
            return true;
        }

        if ($this->player2->bankrupt()) {
            return true;
        }

        return false;
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

    private function updateCredits(string $headsOrTails): void
    {
        if ($headsOrTails == Coin::Heads) {
            $this->player1->winsAgainst($this->player2);
        } else {
            $this->player2->winsAgainst($this->player1);
        }
    }
}
