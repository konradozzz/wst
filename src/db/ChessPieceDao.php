<?php declare(strict_types=1);


class ChessPieceDao
{
    const pieceId = "piece_id";
    const pieceType = "piece_type";
    const colorType = "color_type";
    const image = "image";

    const pieceQuery = "select " . self::pieceId . ", piece.type " . self::pieceType . ", color.type " . self::colorType . ", "
    . self::image . " from piece left join color on piece.color_id = color.color_id";

    private DbConnection $connection;

    public function __construct(DbConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getPieces() : array {
        $results = $this->connection->query(self::pieceQuery);

        $pieces = array();
        foreach ($results as $result) {
            $pieces[$result[self::pieceId]] = new ChessPiece(intval($result[self::pieceId]), $result[self::colorType], array(),
                $result[self::image], $result[self::colorType] . $result[self::pieceType]);
        }
        return $pieces;
    }

}
