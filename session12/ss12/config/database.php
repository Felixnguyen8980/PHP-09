<?php
class ConnectDB
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'shop_nhan');
        mysqli_set_charset($this->conn,"utf8");
        
        return $this->conn;
    }
    public function __construct()
    {
        $this->connect();
    }
}
