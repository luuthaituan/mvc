<?php
namespace App\Controllers;
use App\Models\homeModel;

class homeController extends Controller {
    public function index(){
        $getList = new homeModel();
        $posts = $getList->getAll();
        return $this->loadView("../Views/HomePage/Home.php", ["posts" => $posts]);
    }

    public function contactUs(){
        return $this->loadView("../Views/HomePage/contact.php");
    }

    public function showSingle($id) {
        $getList = new homeModel();
        $posts = $getList->getByID($id);
        return $this->loadView("../Views/HomePage/singleNews.php", ["posts" => $posts]);
    }
}