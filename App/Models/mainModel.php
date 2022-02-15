<?php
namespace App\Models;
class mainModel extends Model {
    public function getAll() {
        $posts = $this->selectAll("posts");
        return $posts;
    }

    public function addPost(){
        $title = htmlspecialchars($_POST['name']);
        $summary = htmlspecialchars($_POST['summary']);
        $link = htmlspecialchars($_POST['link']);
        $content = htmlspecialchars($_POST['content']);
        $insert = $this->conn->prepare("insert into posts set name = :title, summary = :summary, image = :link, content = :content");
        $insert->execute(array(
            ":title" => $title,
            ":summary" => $summary,
            ":link" => $link,
            ":content" => $content
        ));
    }

    public function deleteThePost($id){
        $query = $this->conn->prepare("delete from posts where id = :id");
        $query->execute(array(
            ":id" => $id
        ));
    }



    public function updateDetailPost($id){
        $posts = $this->findInfoUpdate("posts", $id);
        return $posts;
    }
}