<?php
namespace App\Models;
use Core\DB;
class Model {
    public $connectFile;
    public $dataSet = NULL;
    public $sqlQuery = NULL;
    public $conn;


    public function __construct()
    {
        $this->connectFile = new DB();
        $this->conn = $this->connectFile->dbConnect();
    }

    public function selectAll($tableName)
    {
        $this->sqlQuery = "SELECT * FROM $tableName";
        $query = $this->conn->query($this->sqlQuery);
        return $query->fetchAll();
    }

}