<?php


class BoardState
{
    private array $positions;

    public function __construct($positions)
    {
        $this->positions = $positions;
    }

    public function getTile($position)
    {
        return in_array($position, $this->positions);
    }
}
