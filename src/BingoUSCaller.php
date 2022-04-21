<?php

/**
 * Se encarga de:
 * 1. Generar un numero, simulando la extraccion de la bolilla
 * 2. Mantener la lista de numeros que ya salieron
 */
class BingoUSCaller
{
  private $numbers = [];

  public function __construct(){

  }

  public function extractNumber():int{
    do{
      $number = rand(USConstants::GRID_MIN_VALUE,USConstants::GRID_MAX_VALUE);
    }while(in_array($number, $this->numbers));

    $this->numbers[] = $number;

    return $number;
  }

  public function isANumberExtracted($number):bool{
    return in_array($number, $this->numbers);
  }
}