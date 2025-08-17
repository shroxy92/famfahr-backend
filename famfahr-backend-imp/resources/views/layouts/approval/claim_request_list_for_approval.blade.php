@extends('layouts.master')
@section('title', 'Claimed/All Requested List')
@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">All Financial Requests</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Category</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Submitted</th>
                            <th scope="col">Action</th> {{-- Changed from Status --}}
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><span class="badge bg-info text-dark">Advance Salary</span></td>
                            <td>Shafayet</td>
                            <td>IT</td>
                            <td></td>
                            <td>1,2000.00</td>
                            <td>Home rent advance for July</td>
                            <td>01 Jul 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="1">
                                        <button type="submit" class="badge bg-success">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="1">
                                        <button type="submit" class="badge bg-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><span class="badge bg-success">Loan</span></td>
                            <td>Nokib</td>
                            <td>Accounts</td>
                            <td></td>
                            <td>15,000.00</td>
                            <td>Byke repair loan</td>
                            <td>20 Jun 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="2">
                                        <button type="submit" class="badge bg-success">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="2">
                                        <button type="submit" class="badge bg-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><span class="badge bg-secondary">Claim</span></td>
                            <td>Niloy</td>
                            <td>Import</td>
                            <td></td>
                            <td>250.00</td>
                            <td>Medical reimbursement for June</td>
                            <td>15 Jun 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="3">
                                        <button type="submit" class="badge bg-success">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="3">
                                        <button type="submit" class="badge bg-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><span class="badge bg-info text-dark">Advance Salary</span></td>
                            <td>Shafayet</td>
                            <td>IT</td>
                            <td></td>
                            <td>8000.00</td>
                            <td>Emergency family support</td>
                            <td>10 Jun 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="4">
                                        <button type="submit" class="badge bg-success">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="4">
                                        <button type="submit" class="badge bg-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><span class="badge bg-secondary">Claim</span></td>
                            <td>Shafayet</td>
                            <td>IT</td>
                            <td></td>
                            <td>1500.00</td>
                            <td>Travel reimbursement (conference)</td>
                            <td>05 Jun 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="5">
                                        <button type="submit" class="badge bg-success">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="5">
                                        <button type="submit" class="badge bg-danger">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
