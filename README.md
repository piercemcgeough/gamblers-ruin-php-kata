# Gambler's Ruin

The gambler's ruin is a concept in statistics. It is most commonly expressed as follows:

1. A gambler playing a game with negative expected value will eventually go broke, regardless of their betting system.

2. A persistent gambler who raises his or her bet to a fixed fraction of the gambler's bankroll after a win, but does not reduce it after a loss, will eventually and inevitably go broke, even if each bet has a positive expected value.

3. Another statement of the concept is that a persistent gambler with finite wealth, playing a fair game (that is, each bet has expected value of zero to both sides) will eventually and inevitably go broke against an opponent with infinite wealth.

<br>

## Let's Use and Expand on Point 3

In addition to inevitably going broke against an opponent with infinite wealth, the odds of winning against an opponent with the same finite bankroll is 50%.

In fact, we can calculate the odds of success in playing a fair game with any finite values by using the following formula:

**P1 odds of winning:** <br>
```
(1 - (P2 Credits / (P1 Credits +  P2 Credits))) * 100
```

**P2 odds of winning:** <br>
```
(1 - (P1 Credits / (P1 Credits +  P2 Credits))) * 100
```

```
P1 Credits = 100
P2 Credits = 200

P1 Odds = (1 - (200 / (100 +  200))) * 100
P1 Odds = (1 - (200 / 300)) * 100
P1 Odds = (1 - (0.6666)) * 100
P1 Odds = 0.3333 * 100
P1 Odds = 33.33%

P2 Odds = (1 - (100 / (100 +  200))) * 100
P2 Odds = (1 - (100 / 300)) * 100
P2 Odds = (1 - (0.3333)) * 100
P2 Odds = 0.6666 * 100
P2 Odds = 66.66%
```

Player 1's odds of winning are **33.33%** <br>
Player 2's odds of winning are **66.66%**

## Exercise

Create a script that will play a game where a coin is flipped. Each player will start with the same number of credits and is assigned heads or tails. If the coin lands on their side then that player will win a credit from their opponent. The game ends when one player is bankrupt.

You should output the winner and how many flips it took to win the game.
