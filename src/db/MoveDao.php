<?php declare(strict_types=1);


class MoveDao
{
    const moveId = "move_id";
    const pieceId = "piece_id";
    const deltaCol = "delta_col";
    const deltaRow = "delta_row";
    const recursiveRule = "recursive_rule";
    const canCapture = "can_capture";
    const mustCapture = "must_capture";

    const moveQuery = "select " . self::moveId . ", " . self::deltaCol . ", " . self::deltaRow . ", " . self::recursiveRule
    . ", " . self::canCapture . ", " . self::mustCapture . " from move";

    const pieceMoveQuery = "select " . self::pieceId . ", " . self::moveId . " from piece_move";

    private DbConnection $connection;

    public function __construct(DbConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getMoves() : array {
        $movesResult = $this->connection->query(self::moveQuery);
        $moves = array();
        foreach ($movesResult as $move) {
            $movePath = new MovePath(intval($move[self::deltaRow]), intval($move[self::deltaCol]), boolval($move[self::recursiveRule]));
            $moveRule = new MoveRule(boolval($move[self::canCapture]), boolval($move[self::mustCapture]));
            $moves[$move[self::moveId]] = new Move($movePath, $moveRule);
        }

        $pieceMovesResult = $this->connection->query(self::pieceMoveQuery);
        $pieceMoves = array();
        foreach ($pieceMovesResult as $pieceMove) {
            if (!isset($pieceMoves[$pieceMove[self::pieceId]])) {
                $pieceMoves[$pieceMove[self::pieceId]] = array();
            }
            array_push($pieceMoves[$pieceMove[self::pieceId]], $moves[$pieceMove[self::moveId]]);
        }

        return $pieceMoves;
    }

}
