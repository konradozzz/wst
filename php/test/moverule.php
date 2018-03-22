<?php
require("../moverule.php");

//rule names seen from the view of a chess piece looking over the board

$oneStepForward = new MoveRule(1, 0, false);
assert($oneStepForward->validateMove(1, 1, 2, 1));
assert($oneStepForward->validateMove(2, 2, 3, 2));
assert(!$oneStepForward->validateMove(1, 1, 3, 1));
assert(!$oneStepForward->validateMove(1, 1, 0, 1));
assert(!$oneStepForward->validateMove(1, 1, 1, 1));
assert(!$oneStepForward->validateMove(1, 1, 2, 2));

$anyStepForward = new MoveRule(1, 0, true);
assert($anyStepForward->validateMove(1, 1, 2, 1));
assert($anyStepForward->validateMove(2, 2, 3, 2));
assert($anyStepForward->validateMove(1, 1, 3, 1));
assert($anyStepForward->validateMove(1, 1, 10, 1));
assert(!$anyStepForward->validateMove(1, 1, 0, 1));
assert(!$anyStepForward->validateMove(1, 1, 1, 1));
assert(!$anyStepForward->validateMove(1, 1, 2, 2));
