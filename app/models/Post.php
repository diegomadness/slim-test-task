<?php

namespace App\Models;

class Post extends Model
{
    protected $table = 'posts';
    public $id;
    public $title;
    public $content;
}