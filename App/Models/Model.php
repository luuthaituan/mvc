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

    public function find($tableName, $id)
    {
        $this->sqlQuery = "SELECT * FROM " . $tableName . " WHERE id = " . $id;
        $query = $this->conn->query($this->sqlQuery);
        return $query->fetch();
    }

    public function findPost($tableName, $id)
    {
        $this->sqlQuery = "SELECT name, summary, content FROM " . $tableName . " WHERE id = " . $id;
        $query = $this->conn->query($this->sqlQuery);
        return $query->fetch();
    }

    public function findInfoUpdate($tableName, $id)
    {
        $this->sqlQuery = "SELECT name, summary,image, content FROM " . $tableName . " WHERE id = " . $id;
        $query = $this->conn->query($this->sqlQuery);
        return $query->fetch();
    }

    public function selectWhere($tableName, $rowName, $operator, $value, $valueType)
    {
        $this->sqlQuery = "SELECT * FROM " . $tableName . " WHERE " . $rowName . " " . $operator . " ";
        if ($valueType == 'int') {
            $this->sqlQuery .= $value;
        } else if ($valueType == 'char') {
            $this->sqlQuery .= "'" . $value . "'";
        }
        $query = $this->conn->query($this->sqlQuery);
        return $query->fetchAll();
    }

    public function selectById($tableName, $rowName, $value)
    {
        $this->sqlQuery = "SELECT * FROM " . $tableName . " WHERE " . $rowName . " = " . "'" . $value . "'";
        $query = $this->conn->query($this->sqlQuery);
        return $query->fetchAll();
    }

    public function insertInto($tableName, $values)
    {
        $this->sqlQuery = "INSERT INTO " . $tableName . " VALUES (";
        $i = 0;
        while ($values[$i]["val"] != NULL && $values[$i]["type"] != NULL) {
            if ($values[$i]["type"] == "char") {
                $this->sqlQuery .= "'" . $values[$i]["val"] . "'";
            } else if ($values[$i]["type"] == 'int') {
                $this->sqlQuery .= $values[$i]["val"];
            }
            $i++;
            if ($values[$i]["val"] != NULL) {
                $this->sqlQuery .= ',';
            }
        }
        $this->sqlQuery .= ')';
        return $this->conn->query($this->sqlQuery);
    }
}

?>

