<?php
class ChessPiece
{
    private $row;
    private $col;

    public function __construct($row, $col)
    {
        $this->setPosition($row, $col);
    }
    
    public function setPosition($row, $col)
    {
        if (!$this->validatePosition($row, $col)) {
            throw new Exception("Failed to validate position for row: " . $row . ", column: " . $col . ".\n");
        }
        $this->row = $row;
        $this->col = $col;
    }
    
    public function getRow()
    {
        return $this->row;
    }

    public function getCol()
    {
        return $this->col;
    }
    
    private function validatePosition($row, $col)
    {
        return preg_match("/^[1-8]$/", $row) && preg_match("/^[a-h]$/", $col);
    }
}
