<?php declare(strict_types=1);


class MoveRule
{
    private bool $canCapture;
    private bool $mustCapture;

    public function __construct(bool $canCapture, bool $mustCapture)
    {
        $this->canCapture = $canCapture;
        $this->mustCapture = $mustCapture;
    }
    
    public function validateMoves(array $moves, BoardState $boardState)
    {
        $validatedMoves = array();
        foreach ($moves as $move) {
            if ($boardState->getTile($move)) {
                if ($this->canCapture) {
                    array_push($validatedMoves, $move);
                }
                break;
            } else {
                if ($this->mustCapture) {
                    break;
                }
            }
            array_push($validatedMoves, $move);
        }
        return $validatedMoves;
    }
}
