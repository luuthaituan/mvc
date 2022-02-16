<?php
namespace App\Controllers\API;
use App\Controllers\Controller;
use App\Models\mainModel;

class mainController extends Controller {
    public function getAllPosts() {
        $getList = new mainModel();
        $posts= $getList->getAll();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($posts);
    }

    public function showDetailedPost($id){
        $info = new mainModel();
        $posts = $info->getDetailId($id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($posts);
    }

    public function deletePost($id){
        $main = new mainModel();
        $main->deleteThePost($id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(["status" => "Success"]);
    }

    public function addNewPost(){
        ini_set("display_errors", 1);
        $main = new mainModel();
        $result = $main->addPost();
        $posts = array();
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Methods: POST");
        if(!$result){
            $posts['response'] = array("success" => "200", "msg" => "Added Successfully");
        } else {
            $posts['response'] = array("failed" => "405", "msg" => "Invalid Input");
        }
        echo json_encode($posts);
    }
}