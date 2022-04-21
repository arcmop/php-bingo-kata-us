<?php

use Models\Card;

/**
 * Util para verificar si se ha obtenido un ganador en cualquier momento
 */
class BingoUSWinnerChecker{

  public static function isWinner(BingoUSCaller $caller, Card $card){
    $cardNumbers = $card->getNumbersInCard();
    
    foreach ($cardNumbers as $cardNumber) {
      if(is_null($cardNumber)){
        continue;
      }

      if (!$caller->isANumberExtracted($cardNumber)) {
        return false;
      }
    }

    return true;
  }
}