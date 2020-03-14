<?php declare(strict_types=1);


class DbConnection
{
    private const serverName = "localhost";
    private const username = "cljunggr";
    private const password = "cljunggr";
    private const db = "cljunggr";
    private mysqli $connection;

    public function __construct()
    {
        $this->connection = new mysqli(self::serverName, self::username, self::password);
        if ($this->connection->connect_error) {
            throw new RuntimeException($this->connection->connect_error);
        }
        $this->connection->select_db(self::db);
    }

    public function query(string $query) {
        $result = $this->connection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}