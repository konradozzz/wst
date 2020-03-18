<?php declare(strict_types=1);


class Config
{
    private const sectionDatabase = "database";
    private const propertyAddress = "address";
    private const propertyPort = "port";
    private const propertyDatabaseName = "database_name";
    private const propertyUserName = "user_name";
    private const propertyPassword = "password";
    private array $config;

    public function __construct(string $config)
    {
        $this->config = parse_ini_file(__DIR__ . "/../../" . $config, true);
    }

    public function getDatabaseAddress() : string {
        return $this->config[self::sectionDatabase][self::propertyAddress];
    }

    public function getDatabasePort() : int {
        return intval($this->config[self::sectionDatabase][self::propertyPort]);
    }

    public function getDatabaseName() : string {
        return $this->config[self::sectionDatabase][self::propertyDatabaseName];
    }

    public function getDatabaseUserName() : string {
        return $this->config[self::sectionDatabase][self::propertyUserName];
    }

    public function getDatabasePassword() : string {
        return $this->config[self::sectionDatabase][self::propertyPassword];
    }
}