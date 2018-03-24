<?php
require("position.php");
require("moverule.php");
require("chesspiece.php");

$piece = new ChessPiece(1, 1, new MoveRule(1, 0, true));
//echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
$piece->move(2, 1);
//echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
$piece->move(8, 2);
//echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
    
$piece2 = new ChessPiece(1, 1, new MoveRule(0, 1, true));
echo "row: " . $piece2->getRow() . ", column: " . $piece2->getCol() . "; ";
$piece2->move(1, 2);
echo "row: " . $piece2->getRow() . ", column: " . $piece2->getCol() . "; ";
$piece2->move(1, 8);
echo "row: " . $piece2->getRow() . ", column: " . $piece2->getCol() . "; ";
