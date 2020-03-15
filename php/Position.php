<?php declare(strict_types=1);


class Position
{
    private int $row;
    private int $col;
    public const MIN_VALUE = 0;
    public const MAX_VALUE = 7;
    
    public function __construct(int $row, int $col)
    {
        if (!$this->validate($row, $col)) {
            //TODO should not be unchecked, should just kill the affected game
            throw new RuntimeException('Invalid position. row: ' . $row . ', col: ' . $col);
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

    public function setGraveyard()
    {
        $this->row = -1;
        $this->col = -1;
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
