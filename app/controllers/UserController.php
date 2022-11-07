<?php

namespace App\Controllers;

class UserController extends Controller
{

    public function loginPage($request, $response, $args)
    {
        return $this->container->view->render($response, 'login.php');
    }
}