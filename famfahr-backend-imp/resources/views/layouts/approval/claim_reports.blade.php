@extends('layouts.master')
@section('title', 'Claim Report Summary')
@section('content')
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Team Claim Summary Report</h4>
            </div>

            <div class="card-body">
                {{-- Filter Form --}}
                <form class="row g-3 mb-4" method="GET" action="{{ url()->current() }}">
                    <div class="col-md-4">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department">
                            <option value="">-- All Departments --</option>
                            <option value="IT">IT</option>
                            <option value="Accounts">Accounts</option>
                            <option value="Import">Import</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="from_date" name="from_date">
                    </div>
                    <div class="col-md-3">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" class="form-control" id="to_date" name="to_date">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>
                </form>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Team Member</th>
                            <th>Department</th>
                            <th>Total Claims</th>
                            <th>Total Amount</th>
                            <th>Approved</th>
                            <th>Rejected</th>
                            <th>Pending</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- Sample Data --}}
                        <tr>
                            <td>1</td>
                            <td>
                                <a href="{{ url('claim_history_ind') }}" class="text-decoration-none fw-semibold text-primary">
                                    Shafayet
                                </a>
                            </td>
                            <td>IT</td>
                            <td>3</td>
                            <td>৳21,500.00</td>
                            <td><span class="badge bg-success">2</span></td>
                            <td><span class="badge bg-danger">1</span></td>
                            <td><span class="badge bg-warning text-dark">0</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <a href="{{ url('claims/history/102') }}" class="text-decoration-none fw-semibold text-primary">
                                    Nokib
                                </a>
                            </td>
                            <td>Accounts</td>
                            <td>1</td>
                            <td>৳15,000.00</td>
                            <td><span class="badge bg-success">1</span></td>
                            <td><span class="badge bg-danger">0</span></td>
                            <td><span class="badge bg-warning text-dark">0</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <a href="{{ url('claims/history/103') }}" class="text-decoration-none fw-semibold text-primary">
                                    Niloy
                                </a>
                            </td>
                            <td>Import</td>
                            <td>1</td>
                            <td>৳250.00</td>
                            <td><span class="badge bg-success">0</span></td>
                            <td><span class="badge bg-danger">1</span></td>
                            <td><span class="badge bg-warning text-dark">0</span></td>
                        </tr>
                        </tbody>
                        <tfoot class="table-secondary fw-bold">
                        <tr>
                            <td colspan="3" class="text-end">Total</td>
                            <td>5</td>
                            <td>৳36,750.00</td>
                            <td><span class="badge bg-success">3</span></td>
                            <td><span class="badge bg-danger">2</span></td>
                            <td><span class="badge bg-warning text-dark">0</span></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
