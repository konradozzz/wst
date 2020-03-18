<?php
require_once(__DIR__ . "/../includes.php");
echo "===Test Config===";

$config = new Config("chess.ini");
assert($config->getDatabaseAddress() == "localhost");
assert($config->getDatabasePort() == 3306);