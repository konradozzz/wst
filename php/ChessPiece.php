<?php declare(strict_types=1);


class ChessPiece
{
    private Position $position;
    private array $moves;

    public function __construct(Position $position, array $moves)
    {
        $this->position = $position;
        $this->moves = $moves;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
    }

    public function getMoves(BoardState $boardState) {
        $validMoves = array();
        foreach ($this->moves as $move) {
            $validMoves = array_merge($validMoves, $move->getValidMoves($this->position, $boardState));
        }
        return $validMoves;
    }
}
