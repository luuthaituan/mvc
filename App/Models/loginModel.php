<?php
namespace App\Models;
class loginModel extends Model {
    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
//        $password = md5($password);
        $query = $this->conn->prepare("select username from users where username = :username and password = :password");
        $query->execute(array(
           "username" => $username,
           "password" => $password
        ));
        if($query->rowCount() > 0){
            $_SESSION['username'] = $username;
            header('Location: /dashboard');
        } else{
            echo '<script>window.alert("Wrong username or password")</script>';
        }
    }
}