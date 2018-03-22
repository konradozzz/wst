<?php
class ChessPiece
{
    private $row;
    private $col;
    private $moveRule;

    public function __construct($row, $col, $moveRule)
    {
  //      $this->validatePosition($row, $col);
        $this->row = $row;
        $this->col = $col;            
        $this->moveRule = $moveRule;
    }
    
    public function move($row, $col)
    {
//        $this->validatePosition($row, $col);
        if ($this->moveRule->validateMove($this->row, $this->col, $row, $col)) {
            $this->row = $row;
            $this->col = $col;
        }
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
        if (!(preg_match("/^[1-8]$/", $row) && preg_match("/^[a-h]$/", $col))) {
            throw new Exception("Failed to validate position for row: " . $row . ", column: " . $col . ".\n");
        }
    }
}
