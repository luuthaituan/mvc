<?php
namespace App\Controllers;
use App\Models\loginModel;

class logInController extends Controller {
    public function showLogin() {
        return $this->loadView('../Views/AdminView/loginView.php');
    }

    public function login(){
        $model = new loginModel();
        $model->login();
    }

    public function logout(){
        unset($_SESSION['username']);
        header('Location: /login');
    }

}