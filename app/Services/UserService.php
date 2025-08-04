<?php

namespace App\Services;

use App\Contracts\UserServiceContract;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceContract
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data): User
    {
        // TODO: Implement createUser() method.

        return $this->userRepository->createUser($data);
    }

    public function updateUser(int $id, array $data): User
    {
        // TODO: Implement updateUser() method.
        return $this->userRepository->updateUser($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        // TODO: Implement deleteUser() method.
        return $this->userRepository->deleteUser($id);
    }

    public function viewUser()
    {
        // TODO: Implement viewUser() method.
        return $this->userRepository->viewUser();
    }
}
