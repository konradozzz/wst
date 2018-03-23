<?php
class Position
{
    private $row;
    private $col;
    private const MIN_VALUE = 0;
    private const MAX_VALUE = 7;
    
    public function __construct($row, $col)
    {
        if (!self::validate($row) || !self::validate($col)) {
            throw new Exception("Failed to validate position for row: " . $row . " and column: " . $col . ".\n");
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
    
    public static function validate($val)
    {
        if ($val < self::MIN_VALUE || $val > self::MAX_VALUE) {
            return false;
        }
        return true;
    }
}
