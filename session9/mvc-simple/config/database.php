<?php
class ConnectDB
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli('localhost', 'root', 'none', 'php09_mvc_oop');
        return $this->conn;
    }
    public function __construct()
    {
        $this->connect();
    }
}
