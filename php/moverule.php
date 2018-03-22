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
        return true;
    }
}