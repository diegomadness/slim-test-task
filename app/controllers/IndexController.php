<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function indexPage($request, $response, $args)
    {
        //todo: switch to model
        $posts = $this->app->get('db')->table('posts')->get();

        return $this->app->view->render($response, 'index.php', [
            'posts' => $posts
        ]);
    }
}