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
    
    public function validateMove($fromPosition, $toPosition)
    {
        $delta = $toPosition->getDelta($fromPosition);
        if ($this->recursive) {
            if ($this->deltaRow == 0) {
                if ($delta->getRow() != 0) {
                    return false;
                }
                if ($this->deltaCol > 0 && $delta->getCol() <= 0) {
                    return false;
                }
                if ($this->deltaCol < 0 && $delta->getCol() >= 0) {
                    return false;
                }
                return true;
            }
            if ($this->deltaCol == 0) {
                if ($delta->getCol() != 0) {
                    return false;
                }
                if ($this->deltaRow > 0 && $delta->getRow() <= 0) {
                    return false;
                }
                if ($this->deltaRow < 0 && $delta->getRow() >= 0) {
                    return false;
                }
                return true;
            }
            if ($delta->getRow() / $delta->getCol() == $this->deltaRow / $this->deltaCol) {
                return true;
            }
        }
        else if ($this->validateDelta($delta)) {
            return true;
        }
        return false;
    }
    
    private function validateDelta($delta)
    {
        return $this->deltaRow == $delta->getRow() && $this->deltaCol == $delta->getCol();
    }
}