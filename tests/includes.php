<?php
$srcRoot = __DIR__ . "/../src/";
require_once($srcRoot . "db/BoardStateDao.php");
require_once($srcRoot . "db/ChessPieceDao.php");
require_once($srcRoot . "db/DbConnection.php");
require_once($srcRoot . "db/MoveDao.php");
require_once($srcRoot . "generation/BoardGenerator.php");
require_once($srcRoot . "generation/CssClass.php");
require_once($srcRoot . "generation/TagGenerator.php");
require_once($srcRoot . "chess_logic/BoardState.php");
require_once($srcRoot . "chess_logic/ChessPiece.php");
require_once($srcRoot . "chess_logic/Move.php");
require_once($srcRoot . "chess_logic/MovePath.php");
require_once($srcRoot . "chess_logic/MoveRule.php");
require_once($srcRoot . "chess_logic/Position.php");
require_once($srcRoot . "configuration/Config.php");
