<?php

use App\Models\Coin;
use PHPUnit\Framework\TestCase;

class CoinTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $coin = $this->createMock(Coin::class);

        $this->assertInstanceOf(Coin::class, $coin);
    }

    /** @test */
    public function coin_HasHeadsAndTails()
    {
        $heads = Coin::Heads;
        $tails = Coin::Tails;

        $this->assertEquals(Coin::Heads, $heads);
        $this->assertEquals(Coin::Tails, $tails);

        $this->assertNotEquals(Coin::Heads, $tails);
        $this->assertNotEquals(Coin::Tails, $heads);
    }

    /** @test */
    public function coinTossed_LandingOnHeads_ReturnsHeads()
    {
        $coin = $this->createMock(Coin::class);
        $coin->method('toss')->willReturn(Coin::Heads);

        $this->assertEquals(Coin::Heads, $coin->toss());
    }


    /** @test */
    public function coinTossed_LandingOnTails_ReturnsTails()
    {
        $coin = $this->createMock(Coin::class);
        $coin->method('toss')->willReturn(Coin::Tails);

        $this->assertEquals(Coin::Tails, $coin->toss());
    }

    /** @test */
    public function coinFlipped_ReturnsHeadsOrTails()
    {
        $result = Coin::Flip();

        $this->assertContains($result, [Coin::Heads, Coin::Tails]);
    }
}
