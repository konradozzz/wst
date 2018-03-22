<?php
require("moverule.php");
require("chesspiece.php");

$piece = new ChessPiece(1, 1, new MoveRule(1, 0));
echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
$piece->move(2, 1);
echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
    
