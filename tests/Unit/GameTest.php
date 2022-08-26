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
    public function gameCreated_withPlayers_returnsNoErrors()
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
    public function gameGetWinner_withNoWinner_returnsNull()
    {
        $player1 = new Player(':NAME:', 50);
        $player2 = new Player(':NAME:', 50);

        $game = new Game(
            $player1,
            $player2
        );

        $this->assertNull($game->winner());
    }

    /** @test */
    public function gameGetWinner_withWinner_returnsPlayer()
    {
        $player1 = new Player(':NAME:', 0);
        $player2 = new Player(':NAME:', 50);

        $game = new Game(
            $player1,
            $player2
        );

        $this->assertSame($player2, $game->winner());
    }

    /** @test */
    public function displayStartInfo_playersWithSameCredits_outputsNameAnd50Percent()
    {
        $player1 = new Player(':NAME1:', 50);
        $player2 = new Player(':NAME2:', 50);

        $game = new Game(
            $player1,
            $player2
        );

        $expected = ":NAME1: odds of winning: 50%" . PHP_EOL;
        $expected .= ":NAME2: odds of winning: 50%";

        $this->assertEquals($expected, $game->info());

        $this->expectOutputString($expected);
        $game->displayStartInfo();
    }

    /** @test */
    public function displayEndInfo()
    {
        $player1 = new Player(':NAME1:', 0);
        $player2 = new Player(':NAME2:', 50);

        $game = new Game(
            $player1,
            $player2
        );
        $game->play();

        $expected = "Winner: :NAME2:" . PHP_EOL;
        $expected .= "Flips: 0";

        $this->assertEquals($expected, $game->endInfo());

        $this->expectOutputString($expected);
        $game->displayEndInfo();
    }
}
