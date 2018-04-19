<?php
class MovePath
{
    private $deltaRow;
    private $deltaCol;
    private $recursive;

    public function __construct($deltaRow, $deltaCol, $recursive)
    {
        $this->deltaRow = $deltaRow;
        $this->deltaCol = $deltaCol;
        $this->recursive = $recursive;
    }
    
    public function getValidMoves($position)
    {
        $moves = array();
        while ($this->isNextPositionValid($position)) {
            $position = $this->getNextPosition($position);
            array_push($moves, $position);
            if (!$this->recursive) {
                break;
            }
        }
        return $moves;
    }
    
    private function isNextPositionValid($position)
    {
        return $this->getNextPosition($position)->validate();
    }
    
    private function getNextPosition($position)
    {
        return new Position($position->getRow() + $this->deltaRow, $position->getCol() + $this->deltaCol);
    }
}
