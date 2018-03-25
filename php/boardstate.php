<?php
class BoardState
{
    private $positions;

    public function __construct($positions)
    {
        $this->positions = $positions;
    }

    public function getSquare($position)
    {
        if (in_array($position, $this->positions)) {
            return true;
        }
        return false;
    }
}
