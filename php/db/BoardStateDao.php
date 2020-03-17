<?php declare(strict_types=1);


class BoardStateDao
{
    const pieceId = "piece_id";
    const row = "row";
    const col = "col";

    const startStateQuery = "select " . self::pieceId . ", " . self::row . ", " . self::col . " from start_state";

    private DbConnection $connection;

    public function __construct(DbConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getStartState() : BoardState {
        $results = $this->connection->query(self::startStateQuery);

        $positions = array();
        foreach ($results as $result) {
            $positions[$result[self::pieceId]] = new Position(intval($result[self::row]), intval($result[self::col]));
        }
        return new BoardState($positions);
    }
}