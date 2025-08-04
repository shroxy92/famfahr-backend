<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class UserRepository implements UserRepositoryContract
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser(array $data): User
    {

        // TODO: Implement createUser() method.

        $user = $this->model->create([
                'emp_id' => $data['employee_id'],
                'username'    => $data['username'],
                'email'    => $data['username'],
                'password'    => bcrypt($data['password']),
        ]);

        $user->assignRole($data['role']);
        return $user;
    }

    public function updateUser(int $id, array $data): User
    {
        // TODO: Implement updateUser() method.

        return $this->model->update($id,$data);
    }

    public function deleteUser(int $id): bool
    {
        // TODO: Implement deleteUser() method.
        return $this->model->destroy($id);
    }

    public function viewUser()
    {
        // TODO: Implement viewUser() method.

        return $this->model::with(['employee', 'roles'])->get()->map(function ($user) {
            return [
                'username' => $user->username,
                'name'     => optional($user->employee)->first_name . ' ' . optional($user->employee)->last_name,
                'dept'     => optional($user->employee)->department,
                'role'     => optional($user->roles->first())->name ?? 'N/A',
                'status'   => $user->status ? 'Active' : 'Inactive', // assuming a boolean 'status' column
                'id'       => $user->id,
            ];
        });
    }
}
