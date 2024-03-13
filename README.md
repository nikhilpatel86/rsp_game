# Rock Paper Scissors - On PHP Console

## Requirement Spec / SOW
```
rock-paper-scissors

Write the game rock-paper-scissors.

Requirements:

- Player 1always chooses Rock
- Player 2 takes a random choice of rock, paper or scissors
- Following rules apply: rock beats scissors, paper beats rock, scissors beats paper. Both players with the same hand makes a draw


Optional:

- 100 rounds are to be played
- Show a statistic how often each player has won the round and how many draws.
- Add some tests in PHPUnit


Conditions:

- Development in PHP, Output in console
- Write the code in a way that it's extendable in the future (adding new rules f.e.)

```



## Details
Winning Logic Based on https://en.wikipedia.org/wiki/Rock_paper_scissors 
```
       private array $wins = [
        'ROCK' => ['SCISSORS','WATER'],
        'PAPER' => ['ROCK','WATER'],
        'SCISSORS' => ['PAPER','WATER'],
        'FIRE'=>['ROCK','PAPER','SCISSORS'],
        'WATER'=>['FIRE'],
      ];
```

## Setup 
To run the Game From Xampp Installation At Project Location :: C:\xampp\htdocs\rps 
C:\xampp\htdocs\rps> php app/Game.php
It will o/p on console like Below
```
<PS C:\xampp\htdocs\rps> php app/Game.php
1- Player:1 ROCK - Player:2  ROCK |  Winner is : Draw
2- Player:1 ROCK - Player:2  FIRE |  Winner is : Player2
.
.
.
.
95- Player:1 ROCK - Player:2  WATER |  Winner is : Player1
96- Player:1 ROCK - Player:2  FIRE |  Winner is : Player2
97- Player:1 ROCK - Player:2  PAPER |  Winner is : Player2
98- Player:1 ROCK - Player:2  ROCK |  Winner is : Draw
99- Player:1 ROCK - Player:2  FIRE |  Winner is : Player2
100- Player:1 ROCK - Player:2  WATER |  Winner is : Player1

In Game 100 Rounds played statistic :-
  Total Rounds Draw : 24
  Total Rounds Won by Player 1 : 36
  Total Rounds Won by Player 2 : 40
PS C:\xampp\htdocs\rps>
```

## Unit Testing with PHPUnit

```
 C:\xampp\htdocs\rps> .\vendor\bin\phpunit --verbose --debug .\UnitTestFiles\Test\GameTest.php
PHPUnit 9.6.17 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.0.10

Test 'App\GameTest::testClassConstructor' started
Test 'App\GameTest::testClassConstructor' ended
1- Player:1 ROCK - Player:2  SCISSORS |  Winner is : Player1
2- Player:1 ROCK - Player:2  FIRE |  Winner is : Player2
3- Player:1 ROCK - Player:2  WATER |  Winner is : Player1
.
.
.
.
98- Player:1 ROCK - Player:2  ROCK |  Winner is : Draw
99- Player:1 ROCK - Player:2  SCISSORS |  Winner is : Player1
100- Player:1 ROCK - Player:2  ROCK |  Winner is : Draw

In Game 100 Rounds played statistic :-
  Total Rounds Draw : 30
  Total Rounds Won by Player 1 : 36
  Total Rounds Won by Player 2 : 34
Test 'App\GameTest::testPlayer1Wins' started
Test 'App\GameTest::testPlayer1Wins' ended
2- Player:1 ROCK - Player:2  SCISSORS |  Winner is : Player1
4- Player:1 SCISSORS - Player:2  PAPER |  Winner is : Player1
Test 'App\GameTest::testPlayer2Wins' started
Test 'App\GameTest::testPlayer2Wins' ended
2- Player:1 PAPER - Player:2  SCISSORS |  Winner is : Player2


Time: 00:00.011, Memory: 4.00 MB

OK (3 tests, 4 assertions)
PS C:\xampp\htdocs\rps>
```
