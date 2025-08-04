@extends('layouts.master')
@section('title', 'Leave Reports')

@section('content')
    <div class="container py-4">
        <h3 class="mb-4 text-primary"><i class="bi bi-calendar-week-fill me-2"></i> Leave Report Overview</h3>

        {{-- Filter Section --}}
        <div class="card shadow-sm mb-4 sticky-top bg-white" style="z-index: 1000;">
            <div class="card-body">
                <form class="row gy-2 gx-3 align-items-center">
                    <div class="col-sm-4">
                        <label class="form-label fw-semibold">Department</label>
                        <select class="form-select" name="department">
                            <option value="">All Departments</option>
                            <option>IT</option>
                            <option>Finance</option>
                            <option>HR</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label fw-semibold">From Date</label>
                        <input type="date" class="form-control" name="from">
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label fw-semibold">To Date</label>
                        <input type="date" class="form-control" name="to">
                    </div>
                    <div class="col-sm-2 d-flex align-items-end">
                        <button class="btn btn-outline-primary w-100"><i class="bi bi-funnel-fill me-1"></i>Filter</button>
                    </div>
                </form>
            </div>
        </div>

        @php
            $users = [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'department' => 'IT',
                    'designation' => 'Developer',
                    'availed' => 8,
                    'balance' => 4,
                    'history' => [
                        ['type' => 'Casual', 'from' => '2025-06-10', 'to' => '2025-06-12', 'days' => 3, 'reason' => 'Vacation'],
                        ['type' => 'Sick', 'from' => '2025-07-01', 'to' => '2025-07-02', 'days' => 2, 'reason' => 'Flu'],
                    ]
                ],
                [
                    'id' => 2,
                    'name' => 'Jane Smith',
                    'department' => 'HR',
                    'designation' => 'HR Executive',
                    'availed' => 3,
                    'balance' => 9,
                    'history' => [
                        ['type' => 'Casual', 'from' => '2025-06-01', 'to' => '2025-06-02', 'days' => 2, 'reason' => 'Trip'],
                    ]
                ],
            ];
        @endphp

        {{-- Table View --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle table-hover">
                <thead class="table-light sticky-top">
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Availed</th>
                    <th>Remaining</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $user['name'] }}</td>
                        <td>{{ $user['department'] }}</td>
                        <td>{{ $user['designation'] }}</td>
                        <td><span class="badge bg-success">{{ $user['availed'] }} days</span></td>
                        <td><span class="badge bg-info text-dark">{{ $user['balance'] }} days</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#details-{{ $user['id'] }}">
                                <i class="bi bi-eye"></i> View
                            </button>
                        </td>
                    </tr>
                    <tr class="collapse bg-light" id="details-{{ $user['id'] }}">
                        <td colspan="7">
                            <div class="p-3">
                                <strong>Leave History:</strong>
                                <table class="table table-sm table-bordered mt-2">
                                    <thead class="table-secondary">
                                    <tr>
                                        <th>Type</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Days</th>
                                        <th>Reason</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user['history'] as $leave)
                                        <tr>
                                            <td>{{ $leave['type'] }}</td>
                                            <td>{{ $leave['from'] }}</td>
                                            <td>{{ $leave['to'] }}</td>
                                            <td>{{ $leave['days'] }}</td>
                                            <td>{{ $leave['reason'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
