<?php
use App\Controllers\IndexController;
use App\Controllers\PostsController;
use App\Controllers\UserController;
use Illuminate\Database\Capsule\Manager;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require 'vendor/autoload.php';

// Create app
//todo:move to .env
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

//App routes
$app->get('/', function ($request, $response, $args) {
    $controller = new IndexController($this);
    return $controller->indexPage($request, $response, $args);
})->setName('index');

$app->get('/login', function ($request, $response, $args) {
    $controller = new UserController($this);
    return $controller->loginPage($request, $response, $args);
})->setName('login');

$app->post('/login', function ($request, $response, $args) {
    $controller = new UserController($this);
    return $controller->login($request, $response, $args);
})->setName('loginPost');


$app->get('/admin/posts', function ($request, $response, $args) {
    $controller = new PostsController($this);
    return $controller->postsPage($request, $response, $args);
})->setName('posts');

// Run app
$app->run();



