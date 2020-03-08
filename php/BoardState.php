<?php declare(strict_types=1);


class BoardState
{
    private array $positions;

    public function __construct(array $positions)
    {
        $this->positions = $positions;
    }

    public function getTile(Position $position)
    {
        return in_array($position, $this->positions);
    }
}
