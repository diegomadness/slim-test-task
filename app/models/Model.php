<?php

namespace App\Models;

use Slim\Container;

/**
 * @property Container $app
 * @property int $id
 */
class Model
{
    public $id;
    public $fields;
    public static $table;

    public function __construct(Container $container)
    {
        $this->app = $container;
    }

    public static function find($db, $id)
    {
        $db->table(self::$table)->get($id);
    }

    public static function findAll($db)
    {
        return $db->table(self::$table)->get();
    }

    public function save()
    {
        $update = [];
        foreach ($this->fields as $field) {
            $update[$field] = $this->$$field;
        }

        $this->app->get('db')
            ->table('posts')
            ->where('id', $this->id)
            ->update($update);
    }

    public function destroy()
    {
        $this->app->get('db')->table('posts')->delete($this->id);
    }
}