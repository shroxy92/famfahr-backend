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
                    @foreach ([
                        ['id' => 'EMP001', 'name' => 'John Doe', 'department' => 'IT', 'designation' => 'Developer', 'email' => 'john@example.com', 'status' => 'Active'],
                        ['id' => 'EMP002', 'name' => 'Jane Smith', 'department' => 'HR', 'designation' => 'HR Manager', 'email' => 'jane@example.com', 'status' => 'Inactive'],
                        ['id' => 'EMP003', 'name' => 'Ali Hassan', 'department' => 'Finance', 'designation' => 'Accountant', 'email' => 'ali@example.com', 'status' => 'Active']
                    ] as $employee)
                        <tr>
                            <td>{{ $employee['id'] }}</td>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['department'] }}</td>
                            <td>{{ $employee['designation'] }}</td>
                            <td>{{ $employee['email'] }}</td>
                            <td>
                                <span class="badge {{ $employee['status'] === 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $employee['status'] }}
                                </span>
                            </td>
                            <td>
{{--                                <a href="{{ route('employees.show', ['id' => $employee['id']]) }}" class="btn btn-sm btn-outline-primary">--}}
                                <a href="{{ route('employees.show')}}" class="btn btn-sm btn-outline-primary">View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection
