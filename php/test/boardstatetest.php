<?php
require("../Position.php");
require("../BoardState.php");

$positions = array( new Position(0, 0),
                    new Position(0, 1),
                    new Position(2, 0));
$boardState = new BoardState($positions);

assert($boardState->getTile(new Position(0, 0)));
assert(!$boardState->getTile(new Position(3, 0)));
