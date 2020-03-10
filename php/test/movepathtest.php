<?php
require("../Position.php");
require("../MovePath.php");

function compareArrays($a1, $a2)
{
    sort($a1);
    sort($a2);
    return $a1 == $a2;
}

$oneStepForward = new MovePath(1, 0, false);
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


$anyStepForward = new MovePath(1, 0, true);
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
$moves = $anyStepForward->getValidMoves($start);
assert(compareArrays(array(), $moves));

$oneStepBackwards = new MovePath(-1, 0, true);
$start = new Position(1, 1);
$check = array(new Position(0, 1));
$moves = $oneStepBackwards->getValidMoves($start);
assert(compareArrays($check, $moves));
