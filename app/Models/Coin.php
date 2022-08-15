<?php

namespace App\Models;

class Coin
{
    const Heads = 'heads';
    const Tails = 'tails';

    public static function flip()
    {
        $headsOrTails = [self::Heads, self::Tails];

        $coinFlip = array_rand($headsOrTails);

        return $headsOrTails[$coinFlip];
    }
}
