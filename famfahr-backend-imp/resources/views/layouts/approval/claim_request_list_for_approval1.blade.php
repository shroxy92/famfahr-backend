@extends('layouts.master')
@section('title', 'Claimed/All Requested List')

@section('content')
    <style>
        .mint-header {
            background-color: #e6fff2 !important;
            color: #004d40 !important;
        }

        .mint-badge {
            background-color: #ccffe5 !important;
            color: #00675b !important;
            font-weight: 500;
        }

        .mint-accept {
            background-color: #a0f3c4 !important;
            color: #004d40 !important;
            border: none;
        }

        .mint-accept:hover {
            background-color: #8aeab4 !important;
        }

        .mint-reject {
            background-color: #ffc9c9 !important;
            color: #660000 !important;
            border: none;
        }

        .mint-reject:hover {
            background-color: #ffb3b3 !important;
        }

        .table thead {
            background-color: #f0fff8;
        }

        .table-hover tbody tr:hover {
            background-color: #f6fffa;
        }
    </style>

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header mint-header">
                <h5 class="mb-0">All Financial Requests</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Purpose</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><span class="badge mint-badge">Advance Salary</span></td>
                            <td>Shafayet</td>
                            <td>IT</td>
                            <td></td>
                            <td>12,000.00</td>
                            <td>Home rent advance for July</td>
                            <td>01 Jul 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="1">
                                        <button type="submit" class="badge mint-accept">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="1">
                                        <button type="submit" class="badge mint-reject">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td><span class="badge mint-badge">Loan</span></td>
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
                                        <button type="submit" class="badge mint-accept">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="2">
                                        <button type="submit" class="badge mint-reject">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td><span class="badge mint-badge">Claim</span></td>
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
                                        <button type="submit" class="badge mint-accept">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="3">
                                        <button type="submit" class="badge mint-reject">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td><span class="badge mint-badge">Advance Salary</span></td>
                            <td>Shafayet</td>
                            <td>IT</td>
                            <td></td>
                            <td>8,000.00</td>
                            <td>Emergency family support</td>
                            <td>10 Jun 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="4">
                                        <button type="submit" class="badge mint-accept">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="4">
                                        <button type="submit" class="badge mint-reject">Reject</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td><span class="badge mint-badge">Claim</span></td>
                            <td>Shafayet</td>
                            <td>IT</td>
                            <td></td>
                            <td>1,500.00</td>
                            <td>Travel reimbursement (conference)</td>
                            <td>05 Jun 2025</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="POST" action="{{ url('approval/accept') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="5">
                                        <button type="submit" class="badge mint-accept">Accept</button>
                                    </form>
                                    <form method="POST" action="{{ url('approval/reject') }}">
                                        @csrf
                                        <input type="hidden" name="request_id" value="5">
                                        <button type="submit" class="badge mint-reject">Reject</button>
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
