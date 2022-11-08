<?php

namespace App\Models;

class Post extends Model
{
    public static $table = 'posts';
    public $fields = ['title', 'content'];

    public $id;
    public $title;
    public $content;
}