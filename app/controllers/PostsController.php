<?php

namespace App\Controllers;

class PostsController extends Controller
{

    public function postsPage($request, $response, $args)
    {
        return $this->container->view->render($response, 'admin/posts.php');
    }
}