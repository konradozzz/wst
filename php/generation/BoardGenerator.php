<?php declare(strict_types=1);


class BoardGenerator
{
    public static function generate(BoardState $boardState, array $pieces) : string {
        $html = "";
        $tileColor = CssClass::white;
        for ($i = Position::MIN_VALUE; $i <= Position::MAX_VALUE; $i++) {
            for ($j = Position::MIN_VALUE; $j <= Position::MAX_VALUE; $j++) {
                $pieceId = $boardState->getTile(new Position($i, $j));
                $imageHtml = $pieceId ? TagGenerator::generateImage($pieces[$pieceId]->getImage(), $pieces[$pieceId]->getDescription(), CssClass::piece) : "";
                $html = $html . TagGenerator::generateDiv($imageHtml, $tileColor, CssClass::interactive);
                $tileColor = self::swapColor($tileColor);
            }
            $tileColor = self::swapColor($tileColor);
        }
        return TagGenerator::generateDiv($html, CssClass::pieceContainer, CssClass::board);
    }

    private static function swapColor($color) {
        return $color == CssClass::white ? CssClass::black : CssClass::white;
    }
}
