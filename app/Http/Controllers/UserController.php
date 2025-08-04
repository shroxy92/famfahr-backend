<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use App\Services\UserService;
use Couchbase\Role;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $employees = Employee::all();
        $roles = \Spatie\Permission\Models\Role::all();
        return view('layouts.user_management.uadd_user',compact('employees','roles'));
    }

    public function store(UserCreateRequest $request)
    {
        $isUserData = $this->userService->createUser($request->validated());

        return view('layouts.user_management.uuser_list');
    }

    public function viewUsers()
    {
        $userList = $this->userService->viewUser();
        return view('layouts.user_management.uuser_list',compact('userList'));
    }
}
