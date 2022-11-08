<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';
    public $id;
    public $username;
    public $password;
}