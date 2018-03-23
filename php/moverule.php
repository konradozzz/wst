<?php
class MoveRule
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
    
    public function getValidMoves($fromPosition)
    {
        $moves = array();
        if ($this->recursive) {
        try {
            $pos =  new Position($fromPosition->getRow(), $fromPosition->getCol());
            while ($pos = new Position($pos->getRow() + $this->deltaRow,
                $pos->getCol() + $this->deltaCol)) {
                array_push($moves, $pos);
                
            }
        } catch (Exception $e) {
            return $moves;
        }
        } else {
            array_push($moves, new Position($fromPosition->getRow() + $this->deltaRow,
                $fromPosition->getCol() + $this->deltaCol));
        }
        return $moves;
    }
}