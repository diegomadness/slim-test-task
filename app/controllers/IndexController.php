<?php

namespace App\Controllers;

class IndexController extends Controller
{

    public function indexPage($request, $response, $args)
    {
        return $this->container->view->render($response, 'index.php', [
            'name' => "qwe123"
        ]);
    }
}