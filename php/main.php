<?php
    require_once("chesspiece.php");
    
    $piece = new ChessPiece("1", "a");
    echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
    $piece->setPosition("2", "b");
    echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
    $piece->setPosition("0", "b");
    echo "row: " . $piece->getRow() . ", column: " . $piece->getCol() . "; ";
