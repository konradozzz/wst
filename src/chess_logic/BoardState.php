<?php declare(strict_types=1);


class BoardState
{
    private array $positions;

    public function __construct(array $positions) {
        $this->positions = $positions;
    }

    public function getTile(Position $position) {
        return array_search($position, $this->positions);
    }

    public function getPosition(int $id) : Position {
        return $this->positions[$id];
    }

    public function movePiece(int $id, Position $position) : void {
        if ($onTarget = $this->getTile($position)) {
            $this->positions[$onTarget]->setGraveyard();
        }
        $this->positions[$id] = $position;
    }
}
