<?php
require("../db/DbConnection.php");
require("../db/BoardStateDao.php");
require("../Position.php");
require("../BoardState.php");

$db = new DbConnection("localhost", "cljunggr", "cljunggr", "cljunggr", 3306);
$boardStateDao = new BoardStateDao($db);
assert($boardStateDao->getStartState()->getTile(new Position(0, 0)));
assert(!$boardStateDao->getStartState()->getTile(new Position(3, 0)));
