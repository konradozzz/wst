<?php
class MoveRule
{
    private $deltaRow;
    private $deltaCol;

    public function __construct($deltaRow, $deltaCol)
    {
        $this->deltaRow = $deltaRow;
        $this->deltaCol = $deltaCol;
    }
    
    public function validateMove($fromRow, $fromCol, $toRow, $toCol)
    {
        if ($this->validateRowDelta($toRow - $fromRow) && $this->validateColDelta($toCol - $fromCol)) {
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