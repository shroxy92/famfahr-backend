@extends('layouts.master')

@section('title', 'Application Details')

@section('content')
    <div class = "row">
        <div class = "col-1"></div>
        <div class = "col-10">

            <div class="container mt-5">
                <div class="card permission-card">
                    <div class="card-header  text-white" style="color: #375555 !important;font-weight: bold;">
                        <h4><i class="fas fa-user-shield me-2"></i> Manage User Permissions</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf

                            <!-- User Select -->
                            <div class="mb-4">
                                <label for="user" class="form-label">Select User</label>
                                <select class="form-select" id="user" name="user" required>
                                    <option selected disabled>-- Choose a user --</option>
                                    <option value="1">John Doe (Admin)</option>
                                    <option value="2">Jane Smith (HR)</option>
                                    <option value="3">Ali Hassan (Employee)</option>
                                </select>
                            </div>

                            <div class="row">
                                <!-- Employee Management -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">Employee Management</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_employees" id="view_employees"><label class="form-check-label" for="view_employees">View Employees</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="add_employee" id="add_employee"><label class="form-check-label" for="add_employee">Add Employee</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="edit_employee" id="edit_employee"><label class="form-check-label" for="edit_employee">Edit Employee</label></div>
                                </div>

                                <!-- User Management -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">User Management</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_users" id="view_users"><label class="form-check-label" for="view_users">View Users</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="add_user" id="add_user"><label class="form-check-label" for="add_user">Add User</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="edit_user" id="edit_user"><label class="form-check-label" for="edit_user">Edit User</label></div>
                                </div>

                                <!-- Payroll -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">Payroll</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_payroll" id="view_payroll"><label class="form-check-label" for="view_payroll">View Payroll</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="generate_payroll" id="generate_payroll"><label class="form-check-label" for="generate_payroll">Generate Payroll</label></div>
                                </div>

                                <!-- Leave -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">Leave</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="apply_leave" id="apply_leave"><label class="form-check-label" for="apply_leave">Apply for Leave</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="approve_leave" id="approve_leave"><label class="form-check-label" for="approve_leave">Approve Leave</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_leave" id="view_leave"><label class="form-check-label" for="view_leave">View Leave Requests</label></div>
                                </div>

                                <!-- Attendance -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">Attendance</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_attendance" id="view_attendance"><label class="form-check-label" for="view_attendance">View Attendance</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="mark_attendance" id="mark_attendance"><label class="form-check-label" for="mark_attendance">Mark Attendance</label></div>
                                </div>

                                <!-- Roster -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">Roster</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_roster" id="view_roster"><label class="form-check-label" for="view_roster">View Roster</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="edit_roster" id="edit_roster"><label class="form-check-label" for="edit_roster">Edit Roster</label></div>
                                </div>

                                <!-- Claim -->
                                <div class="col-md-4 mb-4">
                                    <div class="permission-section-title">Claim Management</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="submit_claim" id="submit_claim"><label class="form-check-label" for="submit_claim">Submit Claim</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="approve_claim" id="approve_claim"><label class="form-check-label" for="approve_claim">Approve Claim</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="permissions[]" value="view_claims" id="view_claims"><label class="form-check-label" for="view_claims">View Claims</label></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-3">
                                    <i class="fas fa-save me-1"></i> Save Permissions
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class = "col-1"></div>
    </div>

@endsection
