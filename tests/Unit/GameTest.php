<?php

use App\Models\Game;
use App\Models\Player;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $game = $this->createMock(Game::class);

        $this->assertInstanceOf(Game::class, $game);
    }

    /** @test */
    public function game_requiresPlayers()
    {
        $player1 = new Player(':NAME:', 50);
        $player2 = new Player(':NAME:', 50);

        $game = new Game(
            $player1,
            $player2
        );

        $this->assertSame($player1, $game->player1);
        $this->assertSame($player2, $game->player2);
    }

    /** @test */
    public function game_playerWhoBankruptsOpponent_isWinner()
    {
        $player1 = new Player(':NAME:', 1);
        $player2 = new Player(':NAME:', 50);

        $game = new Game(
            $player1,
            $player2
        );
    }
}
