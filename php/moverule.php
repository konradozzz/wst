<?php
class MoveRule
{
    private $deltaRow;
    private $deltaCol;
    private $recursive;
    private $canCapture;
    private $hasToCapture;

    public function __construct($deltaRow, $deltaCol, $recursive)
    {
        $this->deltaRow = $deltaRow;
        $this->deltaCol = $deltaCol;
        $this->recursive = $recursive;
    }
    
    public function getValidMoves($position)
    {
        $moves = array();
        while (($position = $this->increasePosition($position))->validate()) {
            array_push($moves, $position);
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