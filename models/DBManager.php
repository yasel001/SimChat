<?php

class DbManager extends PDO
{
    public function __construct(string $dbName, string $host = "localhost", string $username = "root", string $passwd = "")
    {
        parent::__construct(
            "mysql:dbname=$dbName;host=$host",
            $username,
            $passwd,
            [
                PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_ERRMODE
            ]
        );
        $this->exec("SET NAMES UTF8");
    }
}
