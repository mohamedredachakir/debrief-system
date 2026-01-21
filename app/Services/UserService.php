<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function getAllUsers()
    {
        return $this->userRepo->all();
    }

    public function getLearnersByClass($classId)
    {
        return $this->userRepo->getByClass($classId, 'learner');
    }

    public function getUser($id)
    {
        return $this->userRepo->find($id);
    }

    public function createUser($data)
    {

        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        return $this->userRepo->create($data);
    }

    public function updateUser($id, $data)
    {
         if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        } else {
            unset($data['password']);
        }
        return $this->userRepo->update($id, $data);
    }

    public function getTeacherClasses($teacherId)
    {
        return $this->userRepo->getTeacherClasses($teacherId);
    }
}
