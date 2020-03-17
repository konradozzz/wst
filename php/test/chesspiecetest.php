<?php
require("../ChessPiece.php");
require("../Position.php");
require("../BoardState.php");
require("../Move.php");
require("../MovePath.php");
require("../MoveRule.php");

function compareArrays($a1, $a2)
{
    sort($a1);
    sort($a2);
    return $a1 == $a2;
}

$pieceMove = new MovePath(0, -1, true);
$pieceMove2 = new MovePath(0, 1, true);
$pieceMove3 = new MovePath(1, 0, false);
$pieceRule = new MoveRule(true, false);
$pieceRule2 = new MoveRule(false, false);
$pieceRule3 = new MoveRule(true, true);
$piece1 = new ChessPiece(
    1, 0,
    array(new Move($pieceMove, $pieceRule),
        new Move($pieceMove2, $pieceRule2),
        new Move($pieceMove3, $pieceRule3)),
    "", "");

$piece2 = new ChessPiece(2, "White", array(), "", "");
$piece3 = new ChessPiece(3, "White", array(), "", "");
$piece4 = new ChessPiece(4, "White", array(), "", "");
$pieces = array($piece1, $piece2, $piece3);
$positions = array(1 => new Position(0, 3), new Position(0, 0), new Position(0, 7), new Position(5, 3));

$boardState = new BoardState($positions);

$check = array(new Position(0, 0),
    new Position(0, 1),
    new Position(0, 2),
    new Position(0, 4),
    new Position(0, 5),
    new Position(0, 6),
    );

assert(compareArrays($check, $piece1->getMoves($boardState)));
//print_r($piece1->getMoves($boardState));