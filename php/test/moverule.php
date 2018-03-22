<?php
require("../position.php");
require("../moverule.php");

//rule names seen from the view of a chess piece looking over the board

$oneStepForward = new MoveRule(1, 0, false);
assert($oneStepForward->validateMove(new Position(1, 1), new Position(2, 1)));
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

/* $anyStepForward = new MoveRule(1, 0, true);
assert($anyStepForward->validateMove(new Position(1, 1), new Position(2, 1)));
assert($anyStepForward->validateMove(new Position(2, 2), new Position(3, 2)));
assert($anyStepForward->validateMove(new Position(1, 1), new Position(3, 1)));
assert($anyStepForward->validateMove(new Position(1, 1), new Position(10, 1)));
assert(!$anyStepForward->validateMove(new Position(1, 1), new Position(0, 1)));
assert(!$anyStepForward->validateMove(new Position(1, 1), new Position(1, 1)));
assert(!$anyStepForward->validateMove(new Position(1, 1), new Position(2, 2)));
 */