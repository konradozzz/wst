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
    
    public function validateMoves(array $moves, BoardState $boardState, int $color)
    {
        if ($this->mustCapture) {
            return $this->mustCapture($moves, $boardState, $color);
        }
        if ($this->canCapture) {
            return $this->canCapture($moves, $boardState, $color);
        }
        return $this->cantCapture($moves, $boardState);
    }

    private function cantCapture(array $moves, BoardState $boardState) {
        $validatedMoves = array();
        foreach ($moves as $move) {
            if ($boardState->getTile($move)) {
                break;
            }
            array_push($validatedMoves, $move);
        }
        return $validatedMoves;
    }

    private function canCapture(array $moves, BoardState $boardState, int $color) {
        $validatedMoves = array();
        foreach ($moves as $move) {
            if ($target = $boardState->getTile($move)) {
                if ($color != $target->getColor()) {
                    array_push($validatedMoves, $move);
                }
                break;
            }
            array_push($validatedMoves, $move);
        }
        return $validatedMoves;
    }

    private function mustCapture(array $moves, BoardState $boardState, int $color) {
        $validatedMoves = array();
        foreach ($moves as $move) {
            if ($target = $boardState->getTile($move)) {
                if ($color != $target->getColor()) {
                    array_push($validatedMoves, $move);
                }
                break;
            }
        }
        return $validatedMoves;
    }
}
