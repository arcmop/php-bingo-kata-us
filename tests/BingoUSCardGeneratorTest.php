<?php

use PHPUnit\Framework\TestCase;

class BingoUSCardGeneratorTest extends TestCase{
  public function testCardContainsValidNumbersAccordingToColumn(){
    $generator = new BingoUSCardGenerator();
    $card = $generator->generate();
    $this->assertTrue($card->isValid());
  }
  #fwrite(STDERR, print_r($card, TRUE));

  public function testCardHassFreeSpaceInTheMiddle(){
    $generator = new BingoUSCardGenerator();
    $card = $generator->generate();
    $this->assertTrue($card->isNullInTheMiddle());
  }
}