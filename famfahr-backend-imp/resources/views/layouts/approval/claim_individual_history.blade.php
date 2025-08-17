@extends('layouts.master')
@section('title', 'Claim History - Shafayet')
@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    Claim History for: <strong>Shafayet</strong>
                    <span class="badge bg-light text-dark ms-2">IT Department</span>
                </h5>
            </div>

            <div class="card-body">
                {{-- Summary Section --}}
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="alert alert-primary text-center">
                            <strong>Total Claims:</strong> 4
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-success text-center">
                            <strong>Total Approved Amount:</strong> ৳20,000.00
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-danger text-center">
                            <strong>Total Rejected:</strong> 1
                        </div>
                    </div>
                </div>

                {{-- Table Section --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Purpose</th>
                            <th>Submitted On</th>
                            <th>Approved On</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><span class="badge bg-info text-dark">Advance Salary</span></td>
                            <td>৳12,000.00</td>
                            <td>Home rent advance for July</td>
                            <td>01 Jul 2025</td>
                            <td>02 Jul 2025</td>
                            <td><span class="badge bg-success">Approved</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><span class="badge bg-secondary">Claim</span></td>
                            <td>৳1,500.00</td>
                            <td>Travel reimbursement (conference)</td>
                            <td>05 Jun 2025</td>
                            <td>-</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><span class="badge bg-info text-dark">Advance Salary</span></td>
                            <td>৳8,000.00</td>
                            <td>Emergency family support</td>
                            <td>10 Jun 2025</td>
                            <td>12 Jun 2025</td>
                            <td><span class="badge bg-success">Approved</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><span class="badge bg-secondary">Claim</span></td>
                            <td>৳2,000.00</td>
                            <td>Medical expenses</td>
                            <td>15 Jun 2025</td>
                            <td>18 Jun 2025</td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <a href="{{ url('claim_reports') }}" class="btn btn-secondary mt-3">
                    <i class="fas fa-arrow-left me-1"></i> Back to Team Report
                </a>
            </div>
        </div>
    </div>
@endsection
