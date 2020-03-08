<?php


class MovePath
{
    private int $deltaRow;
    private int $deltaCol;
    private bool $recursive;

    public function __construct($deltaRow, $deltaCol, $recursive)
    {
        $this->deltaRow = $deltaRow;
        $this->deltaCol = $deltaCol;
        $this->recursive = $recursive;
    }
    
    public function getValidMoves($position)
    {
        $moves = array();
        while (($position = $this->getNextPosition($position))->validate()) {
            array_push($moves, $position);
            if (!$this->recursive) {
                break;
            }
        }
        return $moves;
    }

    private function getNextPosition($position)
    {
        return new Position($position->getRow() + $this->deltaRow, $position->getCol() + $this->deltaCol);
    }
}
