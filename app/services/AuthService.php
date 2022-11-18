<?php

namespace App\Services;

use App\Repositories\Repository;

/**
 * @property Repository $userRepository
 */
class AuthService
{
    public function __construct(Repository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function auth($username, $password): bool
    {
        $user = $this->userRepository->findByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION["admin"] = true;
            return true;
        }
        return false;
    }
}
