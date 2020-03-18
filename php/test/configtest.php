<?php
require("../Config.php");

$config = new Config("chess.ini");
assert($config->getDatabaseAddress() == "localhost");
assert($config->getDatabasePort() == 3306);