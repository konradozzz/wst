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

    public function getValidMoves(int $id, BoardState $boardState, int $color) {
        $moves = $this->movePath->getValidMoves($boardState->getPosition($id));
        $moves = $this->moveRule->validateMoves($moves, $boardState, $color);
        return $moves;
    }

}
