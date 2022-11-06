<?php
use App\Controllers\IndexController;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

require 'vendor/autoload.php';

// Create app
$app = new App(['settings' => [
    'displayErrorDetails' => true,
    'debug' => true,
    'whoops.editor' => 'sublime',
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


//App routes
$app->get('/', function ($request, $response, $args) {
    $controller = new IndexController($this, null);
    return $controller->index($request, $response, $args);
})->setName('index');;


// Run app
$app->run();



