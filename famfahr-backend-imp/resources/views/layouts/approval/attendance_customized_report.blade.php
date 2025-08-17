@extends('layouts.master')

@section('title', 'Custom Attendance Report')

@section('content')
    <div class="container py-4">

        {{-- 🔍 Filter Section --}}
        <div class="card border-success shadow-sm mb-3">
            <div class="card-body">
                <form action="#" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" name="from_date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" name="to_date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="department" class="form-label">Department</label>
                        <select name="department" class="form-select">
                            <option value="">All</option>
                            <option value="it">IT</option>
                            <option value="hr">HR</option>
                            <option value="finance">Finance</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="employee" class="form-label">Employee (optional)</label>
                        <select name="employee" class="form-select">
                            <option value="">All</option>
                            <option value="john">John Doe</option>
                            <option value="jane">Jane Smith</option>
                        </select>
                    </div>
                    <div class="col-md-12 d-grid mt-3">
                        <button type="submit" class="btn btn-success">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- 📊 Summary Counts --}}
        <div class="row text-center mb-3">
            <div class="col-md-3 offset-md-3">
                <div class="p-3 border rounded bg-light shadow-sm">
                    <h6 class="text-warning">Total Delays</h6>
                    <h5 class="fw-bold text-warning">12</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded bg-light shadow-sm">
                    <h6 class="text-danger">Total Absents</h6>
                    <h5 class="fw-bold text-danger">5</h5>
                </div>
            </div>
        </div>

        {{-- 📋 Attendance Table --}}
        <div class="table-responsive shadow-sm border border-success rounded">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-success text-center">
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>IN Time</th>
                    <th>OUT Time</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                {{-- Sample rows --}}
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>IT</td>
                    <td>2025-07-13</td>
                    <td>09:12</td>
                    <td>18:05</td>
                    <td class="text-success fw-semibold text-center">Present</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>HR</td>
                    <td>2025-07-13</td>
                    <td class="text-warning">09:45</td>
                    <td>18:00</td>
                    <td class="text-warning fw-semibold text-center">Delay</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ali Reza</td>
                    <td>Finance</td>
                    <td>2025-07-13</td>
                    <td>—</td>
                    <td>—</td>
                    <td class="text-danger fw-semibold text-center">Absent</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
