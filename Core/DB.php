<?php
namespace Core;
use Core\Config;
use PDO;
class DB extends Config {
    public $conn;
    public function dbConnect()
    {
        $this->conn = new PDO("mysql:host=$this->hostName;dbname=$this->dbName;charset=utf8", $this->userName, $this->dbPassword);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->conn;
    }
}