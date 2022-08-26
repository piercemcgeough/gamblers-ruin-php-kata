<?php require 'vendor/autoload.php';

use App\Models\Game;
use App\Models\Player;

$game = new Game(
    new Player('Raymond Reddington', 100),
    new Player('James Spader', 100)
);

$game->displayStartInfo();
echo "\n\n";
$game->displayEndInfo();
echo "\n\n";
