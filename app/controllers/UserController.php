<?php

namespace App\Controllers;

use App\Repositories\Repository;
use App\Services\AuthService;
use Slim\Container;

/**
 * @property Repository $userRepository
 */
class UserController extends Controller
{
    public function __construct(Container $container, Repository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct($container);
    }

    public function loginPage($request, $response, $args)
    {
        //to avoid logout functionality, login page logs you out, making /admin restricted. try it!
        unset($_SESSION["admin"]);
        return $this->app->view->render($response, 'login.php');
    }

    public function login($request, $response, $args)
    {
        //some advanced verification should take place here, skipped due to lack of time
        $username = $request->getParsedBody()['username'];
        $password = $request->getParsedBody()['password'];

        $authService = new AuthService($this->userRepository);
        $data = ['status' => $authService->auth($username, $password)];
        return $response->withJson($data);
    }
}