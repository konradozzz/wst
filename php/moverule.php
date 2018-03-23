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
            $pos =  new Position($fromPosition->getRow(), $fromPosition->getCol());
            while (Position::validate($pos->getRow() + $this->deltaRow, $pos->getCol() + $this->deltaCol)) {
                $pos =  new Position($pos->getRow() + $this->deltaRow, $pos->getCol() + $this->deltaCol);
                array_push($moves, $pos);
            }
        } else {
            array_push($moves, new Position($fromPosition->getRow() + $this->deltaRow,
                $fromPosition->getCol() + $this->deltaCol));
        }
        return $moves;
    }
}