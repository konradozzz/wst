<?php
require("../position.php");
require("../moverule.php");

//rule names seen from the view of a chess piece looking over the board


$oneStepForward = new MoveRule(1, 0, false);
$start = new Position(1, 1);
$check = array( new Position(2, 1));
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


function compareArrays($a1, $a2)
{
    sort($a1);
    sort($a2);
    return $a1 == $a2;
}
/* assert($oneStepForward->validateMove(new Position(1, 1), new Position(2, 1)));
assert($oneStepForward->validateMove(new Position(2, 2), new Position(3, 2)));
assert(!$oneStepForward->validateMove(new Position(1, 1), new Position(3, 1)));
assert(!$oneStepForward->validateMove(new Position(1, 1), new Position(0, 1)));
assert(!$oneStepForward->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$oneStepForward->validateMove(new Position(1, 1), new Position(1, 2)));
assert(!$oneStepForward->validateMove(new Position(1, 1), new Position(2, 2)));

$oneStepRight = new MoveRule(0, 1, false);
assert($oneStepRight->validateMove(new Position(1, 1), new Position(1, 2)));
assert($oneStepRight->validateMove(new Position(2, 2), new Position(2, 3)));
assert(!$oneStepRight->validateMove(new Position(1, 1), new Position(1, 3)));
assert(!$oneStepRight->validateMove(new Position(1, 1), new Position(1, 0)));
assert(!$oneStepRight->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$oneStepRight->validateMove(new Position(1, 1), new Position(2, 1)));
assert(!$oneStepRight->validateMove(new Position(1, 1), new Position(2, 2)));

$anyStepForward = new MoveRule(1, 0, true);
assert($anyStepForward->validateMove(new Position(1, 1), new Position(2, 1)));
assert($anyStepForward->validateMove(new Position(2, 2), new Position(3, 2)));
assert($anyStepForward->validateMove(new Position(1, 1), new Position(3, 1)));
assert($anyStepForward->validateMove(new Position(1, 1), new Position(7, 1)));
assert(!$anyStepForward->validateMove(new Position(1, 1), new Position(0, 1)));
assert(!$anyStepForward->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$anyStepForward->validateMove(new Position(1, 1), new Position(2, 2)));

$anyStepBackwards = new MoveRule(-1, 0, true);
assert($anyStepBackwards->validateMove(new Position(1, 1), new Position(0, 1)));
assert($anyStepBackwards->validateMove(new Position(2, 2), new Position(0, 2)));
assert($anyStepBackwards->validateMove(new Position(7, 1), new Position(2, 1)));
assert(!$anyStepBackwards->validateMove(new Position(1, 1), new Position(7, 1)));
assert(!$anyStepBackwards->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$anyStepBackwards->validateMove(new Position(1, 1), new Position(2, 2)));

$anyStepRight = new MoveRule(0, 1, true);
assert($anyStepRight->validateMove(new Position(1, 1), new Position(1, 2)));
assert($anyStepRight->validateMove(new Position(2, 2), new Position(2, 3)));
assert($anyStepRight->validateMove(new Position(1, 1), new Position(1, 6)));
assert($anyStepRight->validateMove(new Position(2, 1), new Position(2, 7)));
assert(!$anyStepRight->validateMove(new Position(1, 1), new Position(0, 1)));
assert(!$anyStepRight->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$anyStepRight->validateMove(new Position(1, 1), new Position(2, 2)));

$anyStepLeft = new MoveRule(0, -1, true);
assert($anyStepLeft->validateMove(new Position(1, 1), new Position(1, 0)));
assert($anyStepLeft->validateMove(new Position(2, 2), new Position(2, 0)));
assert($anyStepLeft->validateMove(new Position(1, 6), new Position(1, 1)));
assert($anyStepLeft->validateMove(new Position(2, 7), new Position(2, 2)));
assert(!$anyStepLeft->validateMove(new Position(1, 1), new Position(0, 1)));
assert(!$anyStepLeft->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$anyStepLeft->validateMove(new Position(1, 1), new Position(2, 2))); */
