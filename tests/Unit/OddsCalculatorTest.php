<?php

use App\Models\Coin;
use App\Models\OddsCalculator;
use PHPUnit\Framework\TestCase;

class OddsCalculatorTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $calculator = $this->createMock(OddsCalculator::class);

        $this->assertInstanceOf(OddsCalculator::class, $calculator);
    }

    /** @test */
    public function calculateOdds_withSameCredits_returns50()
    {
        $calculator = new OddsCalculator(50, 50);

        $this->assertEquals(50, $calculator->calculate());
    }

    /** @test */
    public function calculateOdds_withDoubleCredits_returns6667()
    {
        $calculator = new OddsCalculator(100, 50);

        $this->assertEquals(66.67, $calculator->calculate());
    }
}
