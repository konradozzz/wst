<?php declare(strict_types=1);


class ChessPiece
{
    private int $id;
    private int $color;
    private array $moves;
    private string $image;
    private string $description;

    public function __construct(int $id, int $color, array $moves, string $image, string $description)
    {
        $this->id = $id;
        $this->color = $color;
        $this->moves = $moves;
        $this->image = $image;
        $this->description = $description;
    }

    //move out and use id from piece array
    public function getMoves(BoardState $boardState) {
        $validMoves = array();
        foreach ($this->moves as $move) {
            $validMoves = array_merge($validMoves, $move->getValidMoves($this->id, $boardState, $this->color));
        }
        return $validMoves;
    }

    public function getColor() : int
    {
        return $this->color;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
