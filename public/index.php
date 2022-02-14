<?php
spl_autoload_register(function ($class){
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});
use Core\Router;
$router= new Router();
$router->register('GET', '/login', ['logInController', 'showLogin']);
$router->register('POST', '/login', ['logInController', 'login']);
$router->register('GET', '/dashboard', ['mainController', 'getAllPosts']);
$router->register('GET', '/addpost', ['mainController', 'showAddPost']);
$router->register('POST', '/addpost', ['mainController', 'addNewPost']);
$router->register('GET', '/logout', ['logInController', 'logout']);
    try {
        $router->matchController();
    } catch (\Exception $exception) {
        echo $exception->getMessage();
        exit();
    }
?>