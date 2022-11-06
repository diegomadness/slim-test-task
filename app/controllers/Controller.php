<?php

namespace App\Controllers;

use Slim\Container;

/**
 * @property Container $container
 * @property $db
 */
class Controller
{

    public function __construct(Container $container, $db)
    {
        $this->container = $container;
        $this->db = $db;
    }
}