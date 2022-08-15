<?php

use App\Models\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $player = $this->createMock(Player::class);

        $this->assertInstanceOf(Player::class, $player);
    }

    /** @test */
    public function player_canBeSetUp()
    {
        $player = new Player(':Name:', 50);

        $this->assertEquals(':Name:', $player->name);
        $this->assertEquals(50, $player->credits);
    }

    /** @test */
    public function player_winningAgainstAnOpponent_willWinCredits()
    {
        $player1 = new Player(':Name:', 50);
        $player2 = new Player(':Name:', 50);

        $player1->winsAgainst($player2);

        $this->assertEquals(51, $player1->credits);
        $this->assertEquals(49, $player2->credits);
    }

    /** @test */
    public function player_losingToOpponent_willLoseCredits()
    {
        $player1 = new Player(':Name:', 50);
        $player2 = new Player(':Name:', 50);

        $player1->losesTo($player2);

        $this->assertEquals(49, $player1->credits);
        $this->assertEquals(51, $player2->credits);
    }

    /** @test */
    public function player_withZeroCredits_isBankrupt()
    {
        $player = new Player(':Name:', 0);

        $this->assertTrue($player->bankrupt());
    }
}
