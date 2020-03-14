<?php declare(strict_types=1);


class ChessPiece
{
    private int $color;
    private Position $position;
    private array $moves;

    public function __construct(Position $position, array $moves, int $color)
    {
        $this->position = $position;
        $this->moves = $moves;
        $this->color = $color;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function getMoves(BoardState $boardState) {
        $validMoves = array();
        foreach ($this->moves as $move) {
            $validMoves = array_merge($validMoves, $move->getValidMoves($this->position, $boardState, $this->color));
        }
        return $validMoves;
    }
}
