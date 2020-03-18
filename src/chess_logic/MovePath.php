<?php declare(strict_types=1);


class MovePath
{
    private int $deltaRow;
    private int $deltaCol;
    private bool $recursive;

    public function __construct(int $deltaRow, int $deltaCol, bool $recursive)
    {
        $this->deltaRow = $deltaRow;
        $this->deltaCol = $deltaCol;
        $this->recursive = $recursive;
    }
    
    public function getValidMoves(Position $position)
    {
        $moves = array();
        while (Position::validate($this->getNextRow($position), $this->getNextCol($position))) {
            $position = new Position($this->getNextRow($position), $this->getNextCol($position));
            array_push($moves, $position);
            if (!$this->recursive) {
                break;
            }
        }
        return $moves;
    }

    private function getNextRow(Position $position) {
        return $position->getRow() + $this->deltaRow;
    }

    private function getNextCol(Position $position) {
        return $position->getCol() + $this->deltaCol;
    }
}
