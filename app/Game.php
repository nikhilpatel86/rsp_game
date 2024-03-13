<?php

namespace App;

use InvalidArgumentException;

class Game
{
    private int $no_of_rounds = 1;   
    private array $all_games_played = [];
    private array $wins = [
        'ROCK' => ['SCISSORS','WATER'],
        'PAPER' => ['ROCK','WATER'],
        'SCISSORS' => ['PAPER','WATER'],
        'FIRE'=>['ROCK','PAPER','SCISSORS'],
        'WATER'=>['FIRE'],
      ];
    
    public function __construct($no_of_rounds)
    {
        $this->no_of_rounds = $no_of_rounds;
        
    }

    public function play(){

        for($i=0;$i<$this->no_of_rounds;$i++){

            $choices =  ['ROCK','PAPER','SCISSORS','WATER','FIRE'];
            $random_key = array_rand($choices);
            $randomchoice = $choices[$random_key];

            $p1_choice='ROCK';
            $p2_choice=$randomchoice;
            $round_id=$i;
             
            $this->gameRound($p1_choice,$p2_choice,$round_id);
        }    
        $this->gameStats();
        
    }
   
    public function gameRound($p1_choice,$p2_choice,$round_id){        

            if ($p1_choice == $p2_choice){
              $round_winner = "Draw";
            } else if( in_array($p1_choice,$this->wins[$p2_choice])     ){ 
              $round_winner = "Player2";
            } else {
              $round_winner = "Player1";
            }
            echo $round_id+1 ."- Player:1 ". $p1_choice." - Player:2  ".$p2_choice ." |  Winner is : ". $round_winner.PHP_EOL;
            array_push($this->all_games_played,[$round_id+1 ,$p1_choice,$p2_choice,$round_winner]);
            return [$round_id+1 ,$p1_choice,$p2_choice,$round_winner];
    }

    private function gameStats()  {
        
        $winnerList = array_column($this->all_games_played, 3);
       
        $summaryAry = array_count_values($winnerList);
        $draw_Counts = isset($summaryAry['Draw']) ? $summaryAry['Draw'] : 0;
        $player_1_WinCounts = isset($summaryAry['Player1']) ? $summaryAry['Player1'] : 0;
        $player_2_WinCounts =  isset($summaryAry['Player2']) ? $summaryAry['Player2'] : 0;
       
        echo PHP_EOL."In Game ".$this->no_of_rounds." Rounds played statistic :-";
        
        echo PHP_EOL."  Total Rounds Draw : ". $draw_Counts;  
        echo PHP_EOL."  Total Rounds Won by Player 1 : ".  $player_1_WinCounts;
        echo PHP_EOL."  Total Rounds Won by Player 2 : ".  $player_2_WinCounts;
        echo PHP_EOL;
    }   
    public function getTotalRounds()  {
        
        return $this->no_of_rounds;
        
    }  
}

$game = new Game(100);
$game->play();