<?php
class MoveRule
{
    private $canCapture;
    private $mustCapture;
    private const MAX_VALUE = 7;

    public function __construct($canCapture, $mustCapture)
    {
        $this->canCapture = $canCapture;
        $this->mustCapture = $mustCapture;
    }
    
    public function validateMoves($moves, $boardState)
    {
        $validatedMoves = array();
        foreach ($moves as $move) {
            if ($boardState->getSquare($move)) {
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
