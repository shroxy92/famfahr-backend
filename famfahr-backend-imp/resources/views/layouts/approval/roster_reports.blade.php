@extends('layouts.master')

@section('title', 'Duty Roster Report')

@section('content')
    <div class="container py-4">
        <h4 class="mb-4 text-success fw-bold">Duty Roster Report</h4>

        {{-- Filters --}}
        <form method="GET" class="row g-3 mb-4 border rounded p-3 shadow-sm">
            <div class="col-md-3">
                <label class="form-label text-muted">From Date</label>
                <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label text-muted">To Date</label>
                <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label text-muted">Duty Type</label>
                <select name="type" class="form-select">
                    <option value="">All</option>
                    <option value="extra" {{ request('type') == 'extra' ? 'selected' : '' }}>Extra Duty</option>
                    <option value="holiday" {{ request('type') == 'holiday' ? 'selected' : '' }}>Holiday Duty</option>
                    <option value="latenight" {{ request('type') == 'latenight' ? 'selected' : '' }}>Late Night Duty</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label text-muted">Department</label>
                <select name="department" class="form-select">
                    <option value="">All</option>
                    <option value="IT" {{ request('department') == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="HR" {{ request('department') == 'HR' ? 'selected' : '' }}>HR</option>
                    <option value="Admin" {{ request('department') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <!-- Add more departments as needed -->
                </select>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-outline-success">Filter</button>
            </div>
        </form>

        {{-- Report Table --}}
        <div class="table-responsive border border-success rounded shadow-sm">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-success text-dark">
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Extra Duties</th>
                    <th>Holiday Duties</th>
                    <th>Late Night Duties</th>
                    <th>Total Duties</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $reportData = [
                        [
                            'id' => 1,
                            'name' => 'John Doe',
                            'department' => 'IT',
                            'extra' => 2,
                            'holiday' => 1,
                            'latenight' => 1,
                        ],
                        [
                            'id' => 2,
                            'name' => 'Jane Smith',
                            'department' => 'HR',
                            'extra' => 1,
                            'holiday' => 0,
                            'latenight' => 2,
                        ],
                    ];
                @endphp

                @forelse ($reportData as $i => $emp)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>
{{--                            <a href="{{ url('reports_ind_roster', $emp['id']) }}" class="text-success fw-semibold text-decoration-none">--}}
{{--                                {{ $emp['name'] }}--}}
{{--                            </a>--}}
                            <a href="{{ url('reports_ind_roster') }}" class="text-success fw-semibold text-decoration-none">
                                {{ $emp['name'] }}
                            </a>
                        </td>
                        <td>{{ $emp['department'] }}</td>
                        <td><span class="badge bg-light text-success">{{ $emp['extra'] }}</span></td>
                        <td><span class="badge bg-light text-success">{{ $emp['holiday'] }}</span></td>
                        <td><span class="badge bg-light text-success">{{ $emp['latenight'] }}</span></td>
                        <td>
                            <span class="fw-bold">{{ $emp['extra'] + $emp['holiday'] + $emp['latenight'] }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No data found for the selected filters.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
