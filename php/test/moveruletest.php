<?php
require("../Position.php");
require("../BoardState.php");
require("../MoveRule.php");

$movePath = array(  new Position(7, 1),
                    new Position(2, 1),
                    new Position(3, 1),
                    new Position(4, 1),
                    new Position(5, 1),
                    new Position(6, 1));
                    
$positions = array( new Position(0, 1),
                    new Position(0, 1),
                    new Position(2, 0));
                    
$boardState = new BoardState($positions);

$moveRule = new MoveRule(true, true);

$validatedMoves = $moveRule->validateMoves($movePath, $boardState);

print_r($validatedMoves);
