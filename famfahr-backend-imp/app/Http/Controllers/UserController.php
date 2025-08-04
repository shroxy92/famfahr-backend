<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
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
        $userList = $this->userService->viewUser();
        return view('layouts.user_management.uuser_list',compact('userList'));
    }

    public function create()
    {
        $employees = Employee::all();
        $roles = \Spatie\Permission\Models\Role::all();
        return view('layouts.user_management.uadd_user',compact('employees','roles'));
    }

    public function store(UserCreateRequest $request)
    {
        $isUserData = $this->userService->createUser($request->validated());

        return redirect()->route('hr.users')->with('success', 'User created successfully.');

    }

    public function edit($id)
    {
        $userData = $this->userService->editUser($id);
        $currentRole = $userData->roles->first()?->name ?? null;
        $roles = \Spatie\Permission\Models\Role::all();
        return view('layouts.user_management.uedit_user',compact('userData','currentRole','roles'));
    }

    public function update(UserUpdateRequest $request, $id)
    {

        $validatedData = $request->validated();
        $this->userService->updateUser($id, $validatedData);
        return redirect()->route('hr.users')->with("success", "User updated successfully");

    }

}
