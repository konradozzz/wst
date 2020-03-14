<?php
require("../Position.php");
require("../BoardState.php");

$position1 = new Position(0, 3);
$position2 = new Position(7, 7);
$positions = array(1 => $position1, 2 => $position2);


$boardState = new BoardState($positions);
assert($boardState->getTile(new Position(0, 3)));
assert(!$boardState->getTile(new Position(3, 0)));

$boardState->movePiece(1, new Position(3, 4));
assert(!$boardState->getTile(new Position(0, 3)));
assert($boardState->getTile(new Position(3, 4)));

$boardState->movePiece(1, new Position(7, 7));
assert(!$boardState->getTile(new Position(3, 4)));
assert($boardState->getTile(new Position(7, 7)));

$boardState->movePiece(1, new Position(0, 0));
assert(!$boardState->getTile(new Position(7, 7)));
assert($boardState->getTile(new Position(0, 0)));
