<?php

$flips = 0;
$winner = null;

$player1 = [
    'name' => 'Raymond Reddington',
    'credits' => 100
];
$player2 = [
    'name' => 'James Spader',
    'credits' => 100
];

while (true) {

    $headsOrTails = ['heads', 'tails'];
    $coinFlip = array_rand($headsOrTails);
    $flips++;

    if ($headsOrTails[$coinFlip] == 'heads') {
        $player1['credits'] += 1;
        $player2['credits'] -= 1;
    } else {
        $player1['credits'] -= 1;
        $player2['credits'] += 1;
    }

    if ($player1['credits'] == 0) {
        $winner = $player2;
        break;
    }

    if ($player2['credits'] == 0) {
        $winner = $player1;
        break;
    }
}

echo PHP_EOL;
echo "Winner: " . $winner['name'] . PHP_EOL;
echo "Flips: " . $flips;
echo PHP_EOL . PHP_EOL;
