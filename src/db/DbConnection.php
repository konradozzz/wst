<?php declare(strict_types=1);


class DbConnection
{
    private mysqli $connection;

    public function __construct(string $servername, string $database, string $username, string $password, $port)
    {
        $this->connection = new mysqli($servername, $username, $password, $database, $port);
        if ($this->connection->connect_error) {
            throw new RuntimeException($this->connection->connect_error);
        }
    }

    public function query(string $query) {
        $result = $this->connection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}