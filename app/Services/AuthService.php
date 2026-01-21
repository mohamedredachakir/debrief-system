<?php

namespace App\Services;

use App\Repositories\UserRepository;

class AuthService
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function authenticate($email, $password)
    {
        $user = $this->userRepo->findByEmail($email);
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
}

