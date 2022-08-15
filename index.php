<?php require 'vendor/autoload.php';

use App\Models\Coin;
use App\Models\Player;

$flips = 0;
$winner = null;

$player1 = new Player('Raymond Reddington', 550);
$player2 = new Player('James Spader', 100);

$player1OddsOfWinning = $player1->oddsOfWinningAgainst($player2);
$player2OddsOfWinning = $player2->oddsOfWinningAgainst($player1);

echo PHP_EOL;
echo "Player 1 (" . $player1->name . ") odds of winning: " . $player1OddsOfWinning . "%" . PHP_EOL;
echo "Player 2 (" . $player2->name . ") odds of winning: " . $player2OddsOfWinning . "%" . PHP_EOL;

while (true) {

    $headsOrTails = Coin::flip();
    $flips++;

    if ($headsOrTails == Coin::Heads) {
        $player1->credits += 1;
        $player2->credits -= 1;
    } else {
        $player1->credits -= 1;
        $player2->credits += 1;
    }

    if ($player1->credits == 0) {
        $winner = $player2;
        break;
    }

    if ($player2->credits == 0) {
        $winner = $player1;
        break;
    }
}

if (isset($winner)) {
    echo PHP_EOL;
    echo "Winner: " . $winner->name . PHP_EOL;
    echo "Flips: " . $flips;
    echo PHP_EOL . PHP_EOL;
}
