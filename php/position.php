<?php
class Position
{
    private $row;
    private $col;
    private const MIN_VALUE = 0;
    private const MAX_VALUE = 7;
    
    public function __construct($row, $col)
    {
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
    
    public function validate()
    {
        if ($this->row < self::MIN_VALUE || $this->row > self::MAX_VALUE ||
            $this->col < self::MIN_VALUE || $this->col > self::MAX_VALUE) {
            return false;
        }
        return true;
    }
}
