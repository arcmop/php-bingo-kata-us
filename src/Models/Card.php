<?php namespace Models;

use USConstants;

/**
 * Clase para mantener los datos de una cartilla
 */
class Card{

  private $grid;

  public function __construct($grid){
    $this->grid = $grid;
  }
  
  /**
   * Validar si una cartilla cumple los paráemtros establecidos
   */
  public function isValid(): bool{
    return $this->hasValidSize() && $this->checkLimits();
  }

  /**
   * Valida que cada columna tenga 5 elementos como máximo
   */
  public function hasValidSize(): bool{
    foreach($this->grid as $column){
      if(sizeof($column) != USConstants::GRID_ROW_MAX_ELEMENTS){
        return false;
      }
    }

    return true;
  }

  /**
   * Valida que un numero generado se encuentre dentro de los limites
   * Permite que los elementos de la columna N puedan tener valor NULL
   */
  public function numberIsBetweenRage($column, $min, $max, $allowNull=false): bool{
    foreach($column as $number){
      if($allowNull && is_null($number)){
        continue;
      }
      if($number < $min || $number > $max){
        return false;
      }
    }
    return true;
  }

  /**
   * Invoca la validacion de las columnas y sus rangos
   */
  public function checkLimits(): bool{    
    return
      $this->numberIsBetweenRage($this->grid['B'], USConstants::GRID_ROW_B_MIN,USConstants::GRID_ROW_B_MAX)
      && $this->numberIsBetweenRage($this->grid['I'], USConstants::GRID_ROW_I_MIN ,USConstants::GRID_ROW_I_MAX)
      && $this->numberIsBetweenRage($this->grid['N'], USConstants::GRID_ROW_N_MIN ,USConstants::GRID_ROW_N_MAX, true)
      && $this->numberIsBetweenRage($this->grid['G'], USConstants::GRID_ROW_G_MIN ,USConstants::GRID_ROW_G_MAX)
      && $this->numberIsBetweenRage($this->grid['O'], USConstants::GRID_ROW_O_MIN ,USConstants::GRID_ROW_O_MAX);
  }

  /***
   * Valida que la target de posicion N2 sea NULL
   */
  public function isNullInTheMiddle(){
    return is_null($this->grid['N'][2]);
  }

  /***
   * Retorna todos los numeros que contiene la tarjeta
   */
  public function getNumbersInCard(){
    return array_merge(
      $this->grid['B'],
      $this->grid['I'],
      $this->grid['N'],
      $this->grid['G'],
      $this->grid['O']
    );
  }
}