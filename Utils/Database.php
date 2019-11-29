<?php

namespace Utils;

use \mysqli;

class Database
{
    private $host;
    private $port;
    private $user;
    private $pass;
    private $dbname;
    public $conn;

    public function __construct()
    {
        $dbconfig = get_config('database');

        $this->host = $dbconfig['host'];
        $this->port = $dbconfig['port'];
        $this->user = $dbconfig['user'];
        $this->pass = $dbconfig['pass'];
        $this->dbname = $dbconfig['dbname'];

        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if ($this->conn->connect_error)
        {
            exit("Connect failed: " . $conn->connect_error);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}
