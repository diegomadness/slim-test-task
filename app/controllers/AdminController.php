<?php

namespace App\Controllers;

use App\Models\Post;
use App\Repositories\Repository;
use Slim\Container;

/**
 * @property Repository $postRepository
 */
class AdminController extends Controller
{
    public function __construct(Container $container, Repository $postRepository)
    {
        $this->postRepository = $postRepository;
        parent::__construct($container);
    }

    public function adminPage($request, $response, $args)
    {
        $posts = $this->postRepository->findAll();
        return $this->app->view->render($response, 'admin/posts.php', [
            'posts' => $posts
        ]);
    }

    /**
     * some advanced verification should take place here, skipped due to lack of time
     */
    public function createPost($request, $response, $args)
    {
        $post = new Post();
        $post->title = $request->getParsedBody()['title'];
        $post->content = $request->getParsedBody()['content'];
        $data = ['status' => $this->postRepository->create($post)];
        return $response->withJson($data);
    }

    /**
     * some advanced verification should take place here, skipped due to lack of time
     */
    public function updatePost($request, $response, $args)
    {
        $post = new Post();
        $post->id = $request->getParsedBody()['id'];
        $post->title = $request->getParsedBody()['title'];
        $post->content = $request->getParsedBody()['content'];
        $data = ['status' => $this->postRepository->update($post)];
        return $response->withJson($data);
    }

    public function deletePost($request, $response, $args)
    {
        $data = ['status' => $this->postRepository->destroy($request->getParsedBody()['id'])];
        return $response->withJson($data);
    }
}