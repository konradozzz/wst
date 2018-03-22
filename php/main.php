<?php
require("moverule.php");
require("chesspiece.php");

$piece = new ChessPiece("1", "a");
echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
$piece->move("2", "b");
echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
    
