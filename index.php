<?php

use App\Controllers\AdminController;
use App\Controllers\IndexController;
use App\Controllers\UserController;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Capsule\Manager;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require 'vendor/autoload.php';
session_cache_limiter(false);
session_start();

// Create app
$app = new App(['settings' => [
    'displayErrorDetails' => true,
    'debug' => true,
    'whoops.editor' => 'sublime',
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'test',
        'username' => 'root',
        'password' => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]
]]);

// Get container
$container = $app->getContainer();

// Register view component
$container['view'] = function ($container) {
    $view = new Twig('resources/views');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = Uri::createFromEnvironment(new Environment($_SERVER));
    $view->addExtension(new TwigExtension($router, $uri));

    return $view;
};

// Register db component
$container['db'] = function ($container) {
    $capsule = new Manager;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$adminMiddleware = function ($request, $response, $next) {
    if(isset($_SESSION["admin"]) && $_SESSION["admin"]) {
        return $next($request, $response);
    }
    $response = $response->withStatus(302);
    return $response->withHeader('Location', '/');
};

//App routes
$app->get('/', function ($request, $response, $args) {
    $controller = new IndexController($this, new PostRepository($this->get('db')));
    return $controller->indexPage($request, $response, $args);
})->setName('index');

$app->get('/login', function ($request, $response, $args) {
    $controller = new UserController($this, new UserRepository($this->get('db')));
    return $controller->loginPage($request, $response, $args);
})->setName('login');

$app->post('/login', function ($request, $response, $args) {
    $controller = new UserController($this, new UserRepository($this->get('db')));
    return $controller->login($request, $response, $args);
})->setName('loginPost');

//admin mw routes
$app->get('/admin', function ($request, $response, $args) {
    $controller = new AdminController($this, new PostRepository($this->get('db')));
    return $controller->adminPage($request, $response, $args);
})->add($adminMiddleware)->setName('admin');

$app->post('/deletePost', function ($request, $response, $args) {
    $controller = new AdminController($this, new PostRepository($this->get('db')));
    return $controller->deletePost($request, $response, $args);
})->add($adminMiddleware)->setName('deletePost');

$app->post('/createPost', function ($request, $response, $args) {
    $controller = new AdminController($this, new PostRepository($this->get('db')));
    return $controller->createPost($request, $response, $args);
})->add($adminMiddleware)->setName('createPost');

$app->post('/updatePost', function ($request, $response, $args) {
    $controller = new AdminController($this, new PostRepository($this->get('db')));
    return $controller->updatePost($request, $response, $args);
})->add($adminMiddleware)->setName('updatePost');

// Run app
$app->run();



