## Features
### Feature: Calling Bingo Numbers
- As a VP of Gaming
  I want my game to call out Bingo numbers
  So that people can play with their cards
- Scenario 01
  - Given I have a Bingo caller
  - When I call a number
  - Then the number is between 1 and 75 inclusive
- Scenario 02
  - Given I have a Bingo caller
  - When I call a number 75 times
  - Then all numbers between 1 and 75 are present 
    And no number has been called more than once

### Feature: Generating Bingo Cards
- As a VP of Gaming
  I want my game to generate random Bingo cards
  So that people can play
- Scenario 01
  - Given I have a Bingo card generator
  - When I generate a Bingo card
  - Then the generated card has 25 unique spaces
    And column $column only contains numbers between $lowerBound and $upperBound inclusive
    And the generated card has 1 FREE space in the middle

### Feature: Checking Bingo Cards
- As a VP of Gaming
  I want my game to check player's cards when they call Bingo
  So that a winner can be decided
- Scenario 01
  - Given a player calls Bingo after all numbers on their card have been called
  - When I check the card
  - Then the player is the winner
- Scenario 02
  - Given a player calls Bingo before all numbers on their card have been called
  - When I check the card
  - Then the player is not the winner

## Run
```sh
docker run -it --entrypoint sh -v $PWD:/mnt -w /mnt composer:latest
composer install
./vendor/bin/phpunit tests
```
