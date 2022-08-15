<?php require 'vendor/autoload.php';

use App\Models\Coin;

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

$p1OddsOfWinning = (1 - ($player2['credits'] / ($player1['credits'] + $player2['credits']))) * 100;
$p2OddsOfWinning = (1 - ($player1['credits'] / ($player1['credits'] + $player2['credits']))) * 100;

echo PHP_EOL;
echo "Player 1 (" . $player1['name'] . ") odds of winning: " . number_format($p1OddsOfWinning, 2) . "%" . PHP_EOL;
echo "Player 2 (" . $player2['name'] . ") odds of winning: " . number_format($p2OddsOfWinning, 2) . "%" . PHP_EOL;

while (true) {

    $headsOrTails = Coin::flip();
    $flips++;

    if ($headsOrTails == Coin::Heads) {
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
