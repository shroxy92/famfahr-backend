@extends('layouts.master')

@section('title', 'Application Details')

@section('content')
    <div class = "row">
        <div class = "col-1"></div>
        <div class = "col-10">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header  text-white">
                        <h4 class="mb-0" style="color: #375555 !important;font-weight: bold;"><i class="fas fa-user-plus me-2"></i>Add New User</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="employee" class="form-label">Select Employee</label>
                                <select class="form-select" id="employee" name="employee" required>
                                    <option selected disabled>Choose an employee</option>
                                    <option value="1">John Doe - IT</option>
                                    <option value="2">Jane Smith - HR</option>
                                    <option value="3">Ali Hassan - Finance</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="johndoe" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-select" id="department" required>
                                        <option selected disabled>Select Department</option>
                                        <option value="IT">IT</option>
                                        <option value="HR">HR</option>
                                        <option value="Finance">Finance</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Sample Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="********" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="********" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" required>
                                    <option selected disabled>Assign Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="hr">HR</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-success"><i class="fas fa-save me-1"></i> Create User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-1"></div>
    </div>

@endsection
