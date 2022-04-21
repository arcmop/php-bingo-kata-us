<?php

use Models\Card;

/**
 * Se encarga de generar cartillas con numeros de forma aleatoria
 */
class BingoUSCardGenerator
{
  private $grid = [
      'B' => [],
      'I' => [],
      'N' => [],
      'G' => [],
      'O' => []
  ];

  /**
   * Generacion de la cartilla respetando los limites
   */
  public function generate(): Card{
    $this->grid['B'] = $this->generateColumnBetweenLimits(USConstants::GRID_ROW_B_MIN ,USConstants::GRID_ROW_B_MAX);
    $this->grid['I'] = $this->generateColumnBetweenLimits(USConstants::GRID_ROW_I_MIN ,USConstants::GRID_ROW_I_MAX);
    $this->grid['N'] = $this->generateColumnBetweenLimits(USConstants::GRID_ROW_N_MIN ,USConstants::GRID_ROW_N_MAX);
    $this->grid['G'] = $this->generateColumnBetweenLimits(USConstants::GRID_ROW_G_MIN ,USConstants::GRID_ROW_G_MAX);
    $this->grid['O'] = $this->generateColumnBetweenLimits(USConstants::GRID_ROW_O_MIN ,USConstants::GRID_ROW_O_MAX);
    $this->grid['N'][2]=null;
    
    return new Card($this->grid);
  }

  public function generateColumnBetweenLimits($min, $max){
    $column = [];

    while(sizeof($column) < USConstants::GRID_ROW_MAX_ELEMENTS ){
      $number = rand($min,$max);

      if(!in_array($number, $column)){
        $column[] = $number;
      }
    }
    return $column;
  }

}