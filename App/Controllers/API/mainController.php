<?php
namespace App\Controllers\API;
use App\Controllers\Controller;
use App\Models\homeModel;
use App\Models\mainModel;

class mainController extends Controller {
    public function getAllPosts() {
        $getList = new mainModel();
        $posts= $getList->getAll();
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($posts);
    }

    public function showDetailedPost($id){
        $info = new mainModel();
        $posts = $info->getDetailId($id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($posts);
    }

    public function showSingle($id) {
        $getList = new homeModel();
        $posts = $getList->getByID($id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($posts);
    }


    public function deletePost($id){
        $main = new mainModel();
        $main->deleteThePost($id);
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        echo json_encode(["status" => "Success"]);
    }

    public function addNewPost(){
        ini_set("display_errors", 1);
        $main = new mainModel();
        $result = $main->addPost();
        $posts = array();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        if(!$result){
            $posts['response'] = array("success" => "200", "msg" => "Added Successfully");
        } else {
            $posts['response'] = array("failed" => "405", "msg" => "Invalid Input");
        }
        echo json_encode($posts);
    }
}