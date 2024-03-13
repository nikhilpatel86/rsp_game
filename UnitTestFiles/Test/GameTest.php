<?php

namespace App;

use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
{
    // List of tests to be performed

    public function testClassConstructor()
    {      
        $game = new Game(25); 
        $this->assertSame(25, $game->getTotalRounds());        
    }

    public function testPlayer1Wins()
    {      
        $game = new Game(25);    
        $p1_choice= "ROCK";
        $p2_choice="SCISSORS";
        $round_id=1; 
         
        $result = $game->gameRound($p1_choice,$p2_choice,$round_id);
        $this->assertEquals(array(2,'ROCK','SCISSORS','Player1'), $result);

        $this->assertEquals(array(4,'SCISSORS','PAPER','Player1'),  $game->gameRound("SCISSORS","PAPER",3) );
    }

    public function testPlayer2Wins()
    {      
        $game = new Game(25);    
        $p1_choice= "PAPER";
        $p2_choice="SCISSORS";
        $round_id=1; 
         
        $result = $game->gameRound($p1_choice,$p2_choice,$round_id);
        $this->assertEquals(array(2,'PAPER','SCISSORS','Player2'), $result);

         
    }
    
}

?>