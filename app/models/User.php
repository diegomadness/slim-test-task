<?php

namespace App\Models;

class User extends Model
{
    public static $table = 'users';
    public $fields = ['username', 'password'];

    public $id;
    public $username;
    public $password;
}