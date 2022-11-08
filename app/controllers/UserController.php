<?php

namespace App\Controllers;

class UserController extends Controller
{

    public function loginPage($request, $response, $args)
    {
        return $this->app->view->render($response, 'login.php');
    }

    public function login($request, $response, $args)
    {
        return $this->app->view->render($response, 'login.php');
    }
}