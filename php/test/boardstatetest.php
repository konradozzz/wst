<?php
require("../position.php");
require("../boardstate.php");

$positions = array( new Position(0, 0),
                    new Position(0, 1),
                    new Position(2, 0));
$boardState = new BoardState($positions);

assert($boardState->getSquare(new Position(0, 0)));
assert(!$boardState->getSquare(new Position(3, 0)));