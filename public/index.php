<?php
session_start();
?>
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
$router->register('GET', '/', ['homeController', 'index']);
$router->register('GET', '/{id}', ['homeController', 'showSingle']);
$router->register('GET', '/contact', ['homeController', 'contactUs']);
$router->register('POST', '/contact', ['homeController', 'sendEmail']);
$router->register('GET', '/login', ['logInController', 'showLogin']);
$router->register('POST', '/login', ['logInController', 'login']);
$router->register('GET', '/dashboard', ['mainController', 'getAllPosts']);
$router->register('GET', '/addpost', ['mainController', 'showAddPost']);
$router->register('POST', '/addpost', ['mainController', 'addNewPost']);
$router->register('GET', '/dashboard/delete/{id}', ['mainController', 'deletePost']);
$router->register('GET', '/dashboard/update/{id}', ['mainController', 'showUpdatePost']);
$router->register('POST', '/dashboard/update/{id}', ['mainController', 'updateThePost']);
$router->register('GET', '/logout', ['logInController', 'logout']);

//api
$router->register('GET', '/api/dashboard', ['API\mainController', 'getAllPosts']);
$router->register('GET', '/api/dashboard/{id}', ['API\mainController', 'showDetailedPost']);
$router->register('GET', '/api/dashboard/delete/{id}', ['API\mainController', 'deletePost']);


    try {
        $router->matchController();
    } catch (\Exception $exception) {
        echo $exception->getMessage();
        exit();
    }
?>