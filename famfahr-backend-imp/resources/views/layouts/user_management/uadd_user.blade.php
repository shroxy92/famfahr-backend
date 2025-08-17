@extends('layouts.master')

@section('title', 'Add New User')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header text-white">
                        <h4 class="mb-0" style="color: #375555 !important; font-weight: bold;">
                            <i class="fas fa-user-plus me-2"></i>Add New User
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('hr.user.store')}}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Select Employee</label>
                                <select class="form-select" id="employee_id" name="employee_id" required>
                                    <option selected disabled>Choose an employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->first_name.' '.$employee->last_name }} - {{ $employee->department }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="johndoe" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="role" class="form-label">Assign Role</label>
                                    <select class="form-select" id="role" name="role" required>
                                        <option selected disabled>Select Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
                                </div>
                            </div>



                            <div class="text-end">
                                <button class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Create User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
@endsection
