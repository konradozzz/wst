<?php declare(strict_types=1);


class Position
{
    private int $row;
    private int $col;
    private const MIN_VALUE = 0;
    private const MAX_VALUE = 7;
    
    public function __construct(int $row, int $col)
    {
        if (!$this->validate($row, $col)) {
            throw new Exception('Invalid position. row: ' . $this->row . ', col: ' . $this->col);
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
    
    public static function validate(int $row, int $col)
    {
        if ($row < self::MIN_VALUE || $row > self::MAX_VALUE ||
            $col < self::MIN_VALUE || $col > self::MAX_VALUE) {
            return false;
        }
        return true;
    }
}
