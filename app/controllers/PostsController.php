<?php

namespace App\Controllers;

class PostsController extends Controller
{

    public function postsPage($request, $response, $args)
    {
        return $this->app->view->render($response, 'admin/posts.php');
    }
}