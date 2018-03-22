<?php
class ChessPiece
{
    private $row;
    private $col;

    public function __construct($row, $col)
    {
        $this->row = $row;
        $this->col = $col;
    }
    
    public function move($row, $col)
    {
        $this->row = $row;
        $this->col = $col;
    }
    
    public function print()
    {
        echo "row: " . $this->row . ", column: " . $this->col . "; \n";
    }
}