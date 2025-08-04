<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryContract
{
    public function createUser(array $data) : User;
    public function updateUser(int $id, array $data) : User;
    public function deleteUser(int $id) : bool;
    public function viewUser();
}
