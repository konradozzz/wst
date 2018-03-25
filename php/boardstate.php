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
        return in_array($position, $this->positions);
    }
}
