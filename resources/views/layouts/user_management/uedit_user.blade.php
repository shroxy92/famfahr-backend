@extends('layouts.master')

@section('title','User List')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header text-dark">
                        <h4 class="mb-0" style="color: #375555 !important;font-weight: bold;"><i class="fas fa-edit me-2"></i>Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="johndoe" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="edit_department" class="form-label">Department</label>
                                <select class="form-select" id="edit_department" required>
                                    <option value="IT" selected>IT</option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="edit_role" class="form-label">Role</label>
                                <select class="form-select" id="edit_role" required>
                                    <option value="admin" selected>Admin</option>
                                    <option value="hr">HR</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-info"><i class="fas fa-save me-1"></i> Save Changes</button>
                                <a href="" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

@endsection
