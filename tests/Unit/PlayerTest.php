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
    public function playerWinsAgainst_opponent_willWinCredits()
    {
        $player1 = new Player(':Name:', 50);
        $player2 = new Player(':Name:', 50);

        $player1->winsAgainst($player2);

        $this->assertEquals(51, $player1->credits);
        $this->assertEquals(49, $player2->credits);
    }

    /** @test */
    public function playerLosesTo_opponent_willLoseCredits()
    {
        $player1 = new Player(':Name:', 50);
        $player2 = new Player(':Name:', 50);

        $player1->losesTo($player2);

        $this->assertEquals(49, $player1->credits);
        $this->assertEquals(51, $player2->credits);
    }

    /** @test */
    public function playerBankrupt_withZeroCredits_returnsTrue()
    {
        $player = new Player(':Name:', 0);

        $this->assertTrue($player->bankrupt());
    }

    /** @test */
    public function playerOddsOfWinningAgainst_opponentWithSameCredits_returns50()
    {
        $player1 = new Player(':Name:', 50);
        $player2 = new Player(':Name:', 50);

        $player1Odds = $player1->oddsOfWinningAgainst($player2);
        $player2Odds = $player2->oddsOfWinningAgainst($player1);

        $this->assertEquals(50, $player1Odds);
        $this->assertEquals(50, $player2Odds);

        $player3 = new Player(':Name:', 50);
        $player4 = new Player(':Name:', 100);

        $player3Odds = $player3->oddsOfWinningAgainst($player4);
        $player4Odds = $player4->oddsOfWinningAgainst($player3);

        $this->assertEquals(33.33, $player3Odds);
        $this->assertEquals(66.67, $player4Odds);
    }

    /** @test */
    public function playerOddsOfWinningAgainst_opponentWithDoubleCredits_returns3333()
    {
        $player1 = new Player(':Name:', 50);
        $player2 = new Player(':Name:', 100);

        $player1Odds = $player1->oddsOfWinningAgainst($player2);
        $player2Odds = $player2->oddsOfWinningAgainst($player1);

        $this->assertEquals(33.33, $player1Odds);
        $this->assertEquals(66.67, $player2Odds);
    }
}
