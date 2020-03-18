<?php
require_once(__DIR__ . "/../includes.php");
echo "===Test BoardStateDao===";

$db = new DbConnection("localhost", "cljunggr", "cljunggr", "cljunggr", 3306);
$boardStateDao = new BoardStateDao($db);
assert($boardStateDao->getStartState()->getTile(new Position(0, 0)));
assert(!$boardStateDao->getStartState()->getTile(new Position(3, 0)));
