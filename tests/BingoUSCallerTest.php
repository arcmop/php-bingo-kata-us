<?php

use PHPUnit\Framework\TestCase;

class BingoUSCallerTest extends TestCase{

  public function testWhenCallAsNumberItsInTheValidRange(){
    $caller = new BingoUSCaller();
    $number = $caller-> extractNumber();
    $this->assertTrue($number >= USConstants::GRID_MIN_VALUE && $number <= USConstants::GRID_MAX_VALUE);
  }

  public function testWhenCalls75TimesAllNumbersArePresent(){
    $caller = new BingoUSCaller();
    $calledNumbers = [];
    $expectedNumbers = range (USConstants::GRID_MIN_VALUE,USConstants::GRID_MAX_VALUE);

    for ($i=1; $i <= USConstants::GRID_MAX_VALUE; $i++){
      $calledNumbers[] = $caller->extractNumber();
    }

    sort($calledNumbers);

    $this->assertEquals($expectedNumbers, $calledNumbers); 
  }
}