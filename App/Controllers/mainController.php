<?php
namespace App\Controllers;
use App\Models\mainModel;

class mainController extends Controller {
    public function getAllPosts() {
        $getList = new mainModel();
        $posts= $getList->getAll();
        return $this->loadView('dashboard.php', ["posts" => $posts]);
    }

    public function showAddPost(){
        return $this->loadView('addPost.php');
    }

    public function addNewPost(){
        $main = new mainModel();
        $main->addPost();
    }
}
