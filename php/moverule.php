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
    
    public function validateMove($fromRow, $fromCol, $toRow, $toCol)
    {
        if ($this->recursive) {
            $zz = ($toRow - $fromRow) / $this->deltaRow;
            if (($toCol - $fromCol) * $zz == $this->deltaCol) {
                return true;
            }
        }
        else if ($this->validateRowDelta($toRow - $fromRow) && $this->validateColDelta($toCol - $fromCol)) {
            return true;
        }
        return false;
    }
    
    private function validateRowDelta($delta)
    {
        return $this->deltaRow == $delta;
    }

    private function validateColDelta($delta)
    {
        return $this->deltaCol == $delta;
    }
}