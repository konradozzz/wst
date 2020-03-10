<?php
require("../ChessPiece.php");
require("../Move.php");
require("../MovePath.php");
require("../MoveRule.php");

$knightMove = new MovePath(1, 2, false);
$knightMove2 = new MovePath(1, -2, false);
$knightRule = new MoveRule(true, false);
$knight = new ChessPiece(new Position(0, 3), array(new Move($knightMove, $knightRule),
    new Move($knightMove2, $knightRule)));
