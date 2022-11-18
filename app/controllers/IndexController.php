<?php

namespace App\Controllers;

use App\Repositories\Repository;
use Slim\Container;

/**
 * @property Repository $postRepository
 */
class IndexController extends Controller
{
    public function __construct(Container $container, Repository $postRepository)
    {
        $this->postRepository = $postRepository;
        parent::__construct($container);
    }

    public function indexPage($request, $response, $args)
    {
        try {
            $posts = $this->postRepository->findAll();
        } catch (\Exception $e) {
            $this->migrate();
        }

        return $this->app->view->render($response, 'index.php', [
            'posts' => $posts
        ]);
    }

    /**
     * Inside any good application migrations shall be at least executed by
     * console command and not be the part of the controllers, but hey,
     * at least this implementation does the work for you unlike just
     * a db.sql file in the project folder
     */
    private function migrate()
    {
        $this->app->get('db')->schema()->dropIfExists('posts');
        $this->app->get('db')->schema()->create('posts', function ($table) {
            $table->id();
            $table->string('title');
            $table->string('content');
        });

        $this->app->get('db')->schema()->dropIfExists('users');
        $this->app->get('db')->schema()->create('users', function ($table) {
            $table->id();
            $table->string('username');
            $table->string('password');
        });
        $this->app->get('db')->table('users')->insert([
            ['username' => 'admin', 'password' => '$2y$10$QAA1KkGtQ5XKIAwDENDjb.IYJkLxIe7g8ShWg6zi4Pdqt1J6k9vbm']
        ]);

        $this->app->get('db')->table('posts')->insert([
            ['title' => 'Example post', 'content' => 'Hello world, I suppose']
        ]);
    }
}