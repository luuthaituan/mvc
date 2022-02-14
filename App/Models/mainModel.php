<?php
namespace App\Models;
class mainModel extends Model {
    public function getAll() {
        $posts = $this->selectAll("posts");
        return $posts;
    }

    public function addPost(){
        $title = $_POST['name'];
        $summary = $_POST['summary'];
        $link = $_POST['link'];
        $content = $_POST['content'];
        var_dump($title);
        echo "<br>";
        var_dump($summary);
        echo "<br>";
        var_dump($link);
        echo "<br>";
        var_dump($content);
        echo "<br>";
        echo "Test luong cua MVC";

    }
}