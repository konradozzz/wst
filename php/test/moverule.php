<?php
require("../position.php");
require("../moverule.php");

function compareArrays($a1, $a2)
{
    sort($a1);
    sort($a2);
    return $a1 == $a2;
}

//rule names seen from the view of a chess piece looking over the board

$oneStepForward = new MoveRule(1, 0, false);
$start = new Position(1, 1);
$check = array(new Position(2, 1));
$moves = $oneStepForward->getValidMoves($start);
assert(compareArrays($check, $moves));

$start = new Position(4, 6);
$check = array(new Position(5, 6));
$moves = $oneStepForward->getValidMoves($start);
assert(compareArrays($check, $moves));

$start = new Position(7, 6);
$check = array();
$moves = $oneStepForward->getValidMoves($start);
assert(compareArrays($check, $moves));


$anyStepForward = new MoveRule(1, 0, true);
$start = new Position(1, 1);
$check = array( new Position(7, 1),
                new Position(2, 1),
                new Position(3, 1),
                new Position(4, 1),
                new Position(5, 1),
                new Position(6, 1));
$moves = $anyStepForward->getValidMoves($start);
assert(compareArrays($check, $moves));

$start = new Position(4, 6);
$check = array( new Position(5, 6),
                new Position(6, 6),
                new Position(7, 6));
$moves = $anyStepForward->getValidMoves($start);
assert(compareArrays($check, $moves));

$start = new Position(7, 6);
try {
    $moves = $anyStepForward->getValidMoves($start);
} catch (Exception $e) {
    assert(false);
}
