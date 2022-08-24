<?php require 'vendor/autoload.php';

use App\Models\Coin;
use App\Models\Game;
use App\Models\Player;

$winner = null;

$player1 = new Player('Raymond Reddington', 100);
$player2 = new Player('James Spader', 100);

$game = new Game($player1, $player2);

echo PHP_EOL;
echo $game->info() . PHP_EOL;

while (true) {

    $headsOrTails = Coin::flip();
    $game->incrementFlips();

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
    echo "Flips: " . $game->flips();
    echo PHP_EOL . PHP_EOL;
}
