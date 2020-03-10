<?php


class Move
{
    private MovePath $movePath;
    private MoveRule $moveRule;

    /**
     * Move constructor.
     * @param MovePath $movePath
     * @param MoveRule $moveRule
     */
    public function __construct(MovePath $movePath, MoveRule $moveRule)
    {
        $this->movePath = $movePath;
        $this->moveRule = $moveRule;
    }

    public function getValidMoves(Position $position, BoardState $boardState) {
        $moves = $this->movePath->getValidMoves($position);
        $moves = $this->moveRule->validateMoves($moves, $boardState);
        return $moves;
    }

}
