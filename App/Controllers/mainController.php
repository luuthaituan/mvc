<?php
namespace App\Controllers;
use App\Models\mainModel;

class mainController extends Controller {
    public function getAllPosts() {
        $getList = new mainModel();
        $posts= $getList->getAll();
        return $this->loadView('../Views/AdminView/dashboard.php', ["posts" => $posts]);
    }

    public function showAddPost(){
        return $this->loadView('../Views/AdminView/addPost.php');
    }

    public function addNewPost(){
        $main = new mainModel();
        $main->addPost();
        echo '<script>window.alert("Post added")</script>';
        return $this->loadView('../Views/AdminView/addPost.php');
    }

    public function deletePost($id){
        $main = new mainModel();
        $main->deleteThePost($id);
        echo '<script>
        window.alert("Post deleted");
        window.location.href = "/dashboard";
        </script>';
    }

    public function showUpdatePost($id){
        $info = new mainModel();
        $posts = $info->updateDetailPost($id);
        return $this->loadView("../Views/AdminView/updatePost.php", ["posts" => $posts]);
    }
}
