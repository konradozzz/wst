<?php
require_once(__DIR__ . "/../includes.php");
echo "===Test MoveRule===";

function compareArrays($a1, $a2)
{
    sort($a1);
    sort($a2);
    return $a1 == $a2;
}

$movePath = array(  new Position(1, 1),
                    new Position(2, 1),
                    new Position(3, 1),
                    new Position(4, 1),
                    new Position(5, 1),
                    new Position(6, 1));

$positions = array( new Position(0, 1),
                    new Position(4, 1),
                    new Position(2, 0));
                    
$boardState = new BoardState($positions);


$check = array( new Position(1, 1),
    new Position(2, 1),
    new Position(3, 1),
    new Position(4, 1));
$moveRule = new MoveRule(true, false);
$validatedMoves = $moveRule->validateMoves($movePath, $boardState, 1);
assert(compareArrays($check, $validatedMoves));


$check = array( new Position(1, 1),
    new Position(2, 1),
    new Position(3, 1));
$moveRule = new MoveRule(false, false);
$validatedMoves = $moveRule->validateMoves($movePath, $boardState, 1);
assert(compareArrays($check, $validatedMoves));


$check = array( new Position(4, 1));
$moveRule = new MoveRule(true, true);
$validatedMoves = $moveRule->validateMoves($movePath, $boardState, 1);
assert(compareArrays($check, $validatedMoves));
//print_r($validatedMoves);
