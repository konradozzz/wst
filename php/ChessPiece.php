<?php declare(strict_types=1);


class ChessPiece
{
    private $row;
    private $col;
    private $moveRule;

    public function __construct($row, $col, $moveRule)
    {
        $this->row = $row;
        $this->col = $col;            
        $this->moveRule = $moveRule;
    }
    
    public function move($row, $col)
    {
    }
    
    public function getRow()
    {
        return $this->row;
    }

    public function getCol()
    {
        return $this->col;
    }
}
