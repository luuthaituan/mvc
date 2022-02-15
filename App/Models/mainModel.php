<?php
namespace App\Models;
class mainModel extends Model {
    public function getAll() {
        $posts = $this->selectAll("posts");
        return $posts;
    }

    public function getDetailId($id){
        $posts = $this->find("posts", $id);
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



    public function findDetailPost($id){
        $posts = $this->findInfoUpdate("posts", $id);
        return $posts;
    }

    public function updatePost($id){
        $title = htmlspecialchars($_POST['name']);
        $summary = htmlspecialchars($_POST['summary']);
        $link = htmlspecialchars($_POST['link']);
        $content = htmlspecialchars($_POST['content']);
        $query = $this->conn->prepare("update posts set name = :title, summary = :summary, image = :image, content = :content where id = :id");
        $query->execute(array(
            ":title" => $title,
            ":summary" => $summary,
            ":image" => $link,
            ":content" => $content,
            ":id" => $id
        ));
    }
}