<?php
require("../Position.php");
require("../BoardState.php");
require("../MoveRule.php");
require("../ChessPiece.php");

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

$positions = array( new ChessPiece(new Position(0, 1), array()),
                    new ChessPiece(new Position(4, 1), array()),
                    new ChessPiece(new Position(2, 0), array()));
                    
$boardState = new BoardState($positions);


$check = array( new Position(1, 1),
    new Position(2, 1),
    new Position(3, 1),
    new Position(4, 1));

$moveRule = new MoveRule(true, false);
$validatedMoves = $moveRule->validateMoves($movePath, $boardState);
assert(compareArrays($check, $validatedMoves));


$check = array( new Position(1, 1),
    new Position(2, 1),
    new Position(3, 1));

$moveRule = new MoveRule(false, false);
$validatedMoves = $moveRule->validateMoves($movePath, $boardState);
assert(compareArrays($check, $validatedMoves));



$moveRule = new MoveRule(false, true);
$validatedMoves = $moveRule->validateMoves($movePath, $boardState);
assert(compareArrays(array(), $validatedMoves));
//print_r($validatedMoves);
