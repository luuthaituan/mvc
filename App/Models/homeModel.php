<?php
namespace App\Models;

class homeModel extends Model {
    public function getAll(){ //lay ra cac bai bao: tieu de, tom tat, link anh, noi dung
        $posts = $this->selectAll("posts");
        return $posts;
    }

}