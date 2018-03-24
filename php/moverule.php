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
        while (($fromPosition = $this->increasePosition($fromPosition))->validate()) {
            array_push($moves, $fromPosition);
            if (!$this->recursive) {
                break;
            }
        }
        return $moves;
    }
    
    private function increasePosition($position)
    {
        return new Position($position->getRow() + $this->deltaRow, $position->getCol() + $this->deltaCol);
    }
}