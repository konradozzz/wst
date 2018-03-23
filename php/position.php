<?php
class Position
{
    private $row;
    private $col;
    private const MIN_VALUE = 0;
    private const MAX_VALUE = 7;
    
    public function __construct($row, $col)
    {
        $this->validateValue($row);
        $this->validateValue($col);
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
    
    private function validateValue($val)
    {
        if ($val < self::MIN_VALUE || $val > self::MAX_VALUE) {
            throw new Exception("Failed to validate position value: " . $val . ".\n");
        }
    }
}
