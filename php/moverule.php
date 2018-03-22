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