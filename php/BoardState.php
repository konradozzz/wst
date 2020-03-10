<?php declare(strict_types=1);


class BoardState
{
    private array $pieces;

    public function __construct(array $pieces)
    {
        $this->pieces = $pieces;
    }

    public function getTile(Position $position)
    {
        foreach ($this->pieces as $piece) {
            if ($piece->getPosition() == $position) {
                return $piece;
            }
        }
    }

    public function movePiece(ChessPiece $piece, Position $position) {
        if ($onTarget = $this->getTile($position)) {
            $this->moveToGraveyard($onTarget);
        }
        $piece->setPosition($position);
    }

    private function moveToGraveyard(ChessPiece $piece) {
        $piece->getPosition()->setGraveyard();
    }
}
