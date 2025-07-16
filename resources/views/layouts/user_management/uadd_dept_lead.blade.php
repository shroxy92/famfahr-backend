@extends('layouts.master')

@section('title', 'Application Details')

@section('content')
    <div class = "row">
        <div class = "col-1"></div>
        <div class = "col-10">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header text-white d-flex align-items-center" style="color: #375555 !important;font-weight: bold;">
                        <h4 class="mb-0"><i class="fas fa-user-tie me-2"></i>Add Department Lead</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <!-- Employee Select -->
                            <div class="mb-4">
                                <label for="employee" class="form-label">Select Employee</label>
                                <select class="form-select" id="employee" name="employee" required>
                                    <option selected disabled>-- Choose an employee --</option>
                                    <option value="1">John Doe (IT)</option>
                                    <option value="2">Jane Smith (HR)</option>
                                    <option value="3">Ali Hassan (Finance)</option>
                                </select>
                            </div>

                            <!-- Role Select -->
                            <div class="mb-4">
                                <label for="role" class="form-label">Assign Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option selected disabled>-- Select role --</option>
                                    <option value="lead">Department Lead</option>
                                    <option value="assistant_lead">Assistant Lead</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check-circle me-1"></i> Assign Lead
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
