<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Capsule\Manager;

/**
 * @property string $table
 * @property Manager $db
 */
class UserRepository implements Repository
{
    public function __construct(Manager $db)
    {
        $this->table = "users";
        $this->db = $db;
    }

    public function findByUsername($username): ?User
    {
        $record = $this->db->table($this->table)->where('username', $username)->first();
        if ($record) {
            $user = new User();
            $user->username = $record->username;
            $user->password = $record->password;
            return $user;
        }
        return null;
    }
}