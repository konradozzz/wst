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
/*         if ($this->recursive) {
            $zz = ($toPosition->getRow() - $fromPosition->getRow()) / $this->deltaRow;
            if (($toPosition->getCol() - $fromPosition->getCol()) * $zz == $this->deltaCol) {
                return true;
            }
        }
        else */ if ($this->validateDelta($toPosition->getDelta($fromPosition))) {
            return true;
        }
        return false;
    }
    
    private function validateDelta($delta)
    {
        return $this->deltaRow == $delta->getRow() && $this->deltaCol == $delta->getCol();
    }
}