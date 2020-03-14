<?php declare(strict_types=1);


class ChessPiece
{
    private int $id;
    private int $color;
    private array $moves;

    public function __construct(int $id, array $moves, int $color)
    {
        $this->id = $id;
        $this->moves = $moves;
        $this->color = $color;
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function getMoves(BoardState $boardState) {
        $validMoves = array();
        foreach ($this->moves as $move) {
            $validMoves = array_merge($validMoves, $move->getValidMoves($this->id, $boardState, $this->color));
        }
        return $validMoves;
    }
}
