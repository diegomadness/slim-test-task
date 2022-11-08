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
        $users = ['username' => 3, 'password' => 3];

        $this->app->get('db')->table('users')->insert($users);
        print_r($users);
        print_r($request);
    }
}