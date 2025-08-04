@extends('layouts.master')

@section('title', 'Application Details')

@section('content')

    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header text-white">
                <h4 class="mb-0" style="color: #375555 !important;font-weight: bold;"><i class="fas fa-user-plus me-2"></i>Employee List</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Demo Data -->
                    @foreach ($empData as $employee)
                        <tr>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->designation }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                <span class="badge {{ $employee->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
