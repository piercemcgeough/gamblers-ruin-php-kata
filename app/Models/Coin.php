<?php

namespace App\Models;

class Coin
{
    const Heads = 'heads';
    const Tails = 'tails';

    public function toss()
    {
        $headsOrTails = [self::Heads, self::Tails];

        $coinFlip = array_rand($headsOrTails);

        return $headsOrTails[$coinFlip];
    }

    public static function flip()
    {
        return (new self)->toss();
    }
}
