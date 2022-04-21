<?php

use PHPUnit\Framework\TestCase;

class BingoUSWinnerCheckerTest extends TestCase{
  public function testWhenCheckerDeterminesAWinnerCorrectly(){
    $caller = new BingoUSCaller();
    $card = (new BingoUSCardGenerator())->generate();
    for($i=1; $i<=75; ++$i){
      $caller->extractNumber();
    }

    $this->assertTrue(BingoUSWinnerChecker::isWinner($caller,$card));
  }

  public function testWhenCheckerDeterminesNotWinnerYet(){
    $caller = new BingoUSCaller();
    $generator = new BingoUSCardGenerator();
    $card = $generator->generate();
    for($i=1; $i<=20; ++$i){
      $caller->extractNumber();
    }
    $this->assertFalse(BingoUSWinnerChecker::isWinner($caller,$card));
  }
}