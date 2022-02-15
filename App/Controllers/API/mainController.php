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
}