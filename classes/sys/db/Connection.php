<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 14:09
 */


namespace sys\db;


class Connection
{
    public $connection;

    public function __construct($config)
    {
        $this->connection = new \PDO("{$config["type"]}:dbname={$config["base"]};host={$config["host"]}", $config["user"], $config["pass"]);
    }
}

