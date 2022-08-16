# Gambler's Ruin

The gambler's ruin is a concept in statistics. It is had a number of expressions but we will focus on the following:

> A persistent gambler with finite wealth, playing a fair game (that is, each bet has expected value of zero to both sides) will eventually and inevitably go broke against an opponent with infinite wealth."

In addition to inevitably going broke against an opponent with infinite wealth, the odds of winning against an opponent with the same finite number of credits is 50%.

We can calculate the odds of success in playing a fair game (such as a coin flip) with any finite values by using the following formula:

**A players odds of winning:** <br>
```
(1 - (OpponentsCredits / (PlayersCredits + OpponentsCredits))) * 100
```

```
Player1 Credits = 100
Player2 Credits = 200

Player1 Odds = (1 - (200 / (100 + 200))) * 100
Player1 Odds = (1 - (200 / 300)) * 100
Player1 Odds = (1 - (0.6666)) * 100
Player1 Odds = 0.3333 * 100
Player1 Odds = 33.33%

Player2 Odds = (1 - (100 / (100 + 200))) * 100
Player2 Odds = (1 - (100 / 300)) * 100
Player2 Odds = (1 - (0.3333)) * 100
Player2 Odds = 0.6666 * 100
Player2 Odds = 66.66%
```

Player 1's odds of winning are **33.33%** <br>
Player 2's odds of winning are **66.66%**

<hr>

## Exercise

This repository includes the initial setup and working solution in `index.php` for this kata.

The app that will play a game where a coin is flipped. Each player will start with the same number of credits and is assigned heads or tails. If the coin lands on their side then that player will win a credit from their opponent. The game ends when one player is bankrupt.

The winner and how many flips it took to win the game is announced at the end of the game.

Your job is to:

1. Refactor the code in the index.php file. Create new classes, helper methods etc. Whatever you need to make the app more developer friendly.
2. Add tests to make sure any changes are accounted for.

## Exercise (Part 2)

Change the app to allow for both players to have different numbers of credits. Output each players' odds of winning before the game gets played.


## Note

Unlike most other katas, due to it's nature this code will give you different results every time it is run.
