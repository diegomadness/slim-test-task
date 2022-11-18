<?php

namespace App\Controllers;

use Slim\Container;

/**
 * @property Container $app
 */
class Controller
{
    public function __construct(Container $container)
    {
        $this->app = $container;
    }
}