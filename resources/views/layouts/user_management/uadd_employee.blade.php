@extends('layouts.master')

@section('title', 'Add New Employee')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-light border-bottom">
                <h4 class="mb-0" style="color: #375555 !important;font-weight: bold;">Add New Employee</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf

                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs mb-4" id="employeeFormTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-personal" style="color: #4c7c7c !important;font-weight: bold;" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab">Personal Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-family" style="color: #4c7c7c !important;font-weight: bold;" data-bs-toggle="tab" data-bs-target="#family" type="button" role="tab">Family Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-contact" style="color: #4c7c7c !important;font-weight: bold;" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-job" style="color: #4c7c7c !important;font-weight: bold;" data-bs-toggle="tab" data-bs-target="#job" type="button" role="tab">Job Info</button>
                        </li>
                    </ul>

                    <!-- Tab Contents -->
                    <div class="tab-content" id="employeeFormContent">

                        <!-- Personal Info -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="employee_id" class="form-label">Employee ID</label>
                                    <input type="text" name="employee_id" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-select" required>
                                        <option value="">Choose...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="marital_status" class="form-label">Marital Status</label>
                                    <select name="marital_status" class="form-select" required>
                                        <option value="">Choose...</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <input type="text" name="nationality" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="religion" class="form-label">Religion</label>
                                    <input type="text" name="religion" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="blood_group" class="form-label">Blood Group</label>
                                    <input type="text" name="blood_group" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="rf_id" class="form-label">RF ID</label>
                                    <input type="text" name="rf_id" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Family Info -->
                        <div class="tab-pane fade" id="family" role="tabpanel">
                            <div class="row g-3 pt-3">
                                <div class="col-md-4">
                                    <label for="father_name" class="form-label">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="mother_name" class="form-label">Mother's Name</label>
                                    <input type="text" name="mother_name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="spouse_name" class="form-label">Spouse's Name</label>
                                    <input type="text" name="spouse_name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="tab-pane fade" id="contact" role="tabpanel">
                            <div class="row g-3 pt-3">
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="emergency_contact" class="form-label">Emergency Contact</label>
                                    <input type="text" name="emergency_contact" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="present_address" class="form-label">Present Address</label>
                                    <input type="text" name="present_address" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="permanent_address" class="form-label">Permanent Address</label>
                                    <input type="text" name="permanent_address" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="mailing_address" class="form-label">Mailing Address</label>
                                    <input type="text" name="mailing_address" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- Job Info -->
                        <div class="tab-pane fade" id="job" role="tabpanel">
                            <div class="row g-3 pt-3">
                                <div class="col-md-4">
                                    <label for="nid_name" class="form-label">NID Name</label>
                                    <input type="text" name="nid_name" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="joining_date" class="form-label">Joining Date</label>
                                    <input type="date" name="joining_date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="">Choose...</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
