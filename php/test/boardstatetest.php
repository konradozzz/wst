<?php
require("../Position.php");
require("../BoardState.php");
require("../ChessPiece.php");

$piece1 = new ChessPiece(new Position(0, 3), array());
$piece2 = new ChessPiece(new Position(7, 7), array());
$pieces = array($piece1, $piece2);

$boardState = new BoardState($pieces);
assert($boardState->getTile(new Position(0, 3)));
assert(!$boardState->getTile(new Position(3, 0)));

$boardState->movePiece($piece1, new Position(3, 4));
assert(!$boardState->getTile(new Position(0, 3)));
assert($boardState->getTile(new Position(3, 4)));

$boardState->movePiece($piece1, new Position(7, 7));
assert(!$boardState->getTile(new Position(3, 4)));
assert($boardState->getTile(new Position(7, 7)));
assert($piece1->getPosition()->getCol() == 7);
assert($piece1->getPosition()->getRow() == 7);
assert($piece2->getPosition()->getCol() == -1);
assert($piece2->getPosition()->getRow() == -1);

$boardState->movePiece($piece1, new Position(0, 0));
assert(!$boardState->getTile(new Position(7, 7)));
assert($boardState->getTile(new Position(0, 0)));
