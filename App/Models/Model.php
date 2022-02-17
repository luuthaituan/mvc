<?php
namespace App\Models;
use Core\DB;
use App\HTTP\HttpResponse;
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
//        if($_SERVER['REQUEST_METHOD'] == 'GET'){
//            $rowCount = $query->rowCount();
//            $postsArray = array();
//            if ($rowCount === 0) {
//                // set up response for unsuccessful return
//                $response = new HttpResponse();
//                $response->setHttpStatusCode(404);
//                $response->setSuccess(false);
//                $response->addMessage("posts not found");
//                $response->send();
//                exit;
//            }
//            while ($row = $query->fetch()) {
//
//                // create category and store in array for return in json data
//                $posts = array();
//                $posts['id'] = $row['id'];
//                $posts['name'] = $row['name'];
//                $posts['summary'] = $row['summary'];
//                $posts['image'] = $row['image'];
//                $posts['content'] = $row['content'];
//                $postsArray[]= $posts;
//            }
//            $returnData = array();
//            $returnData['rows_returned'] = $rowCount;
//            $returnData['posts'] = $postsArray;
//
//            // set up response for successful return
//            $response = new HttpResponse();
//            $response->setHttpStatusCode(200);
//            $response->setSuccess(true);
//            $response->toCache(true);
//            $response->setData($returnData);
//            $response->send();
//            exit();
//        }
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

