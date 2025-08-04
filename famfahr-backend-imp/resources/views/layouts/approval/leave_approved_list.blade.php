@extends('layouts.master')
@section('title', 'Approved Leave Requests')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4"><i class="bi bi-check-circle-fill text-success me-2"></i> Approved Leave Requests</h2>

        @php
            $approvedApplications = [
                ['id' => 1, 'employee' => 'John Doe', 'type' => 'Casual Leave', 'start_date' => '2025-07-10', 'end_date' => '2025-07-12', 'days' => 3, 'reason' => 'Family trip', 'approved_by' => 'HR', 'approval_date' => '2025-07-09', 'comment' => 'Safe travels'],
                ['id' => 2, 'employee' => 'Jane Smith', 'type' => 'Sick Leave', 'start_date' => '2025-06-28', 'end_date' => '2025-06-29', 'days' => 2, 'reason' => 'Fever', 'approved_by' => 'Manager', 'approval_date' => '2025-06-27', 'comment' => 'Take rest'],
                ['id' => 3, 'employee' => 'Tanvir Hasan', 'type' => 'Emergency Leave', 'start_date' => '2025-07-01', 'end_date' => '2025-07-01', 'days' => 1, 'reason' => 'Urgent matter', 'approved_by' => 'Team Lead', 'approval_date' => '2025-06-30', 'comment' => 'Approved quickly'],
                // Add more as needed
            ];
        @endphp

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-success">
                        <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Days</th>
                            <th>Reason</th>
                            <th>Approved By</th>
                            <th>Approval Date</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($approvedApplications as $app)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="#" class="text-decoration-none fw-bold text-primary" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $app['id'] }}">
                                        {{ $app['employee'] }}
                                    </a>
                                </td>
                                <td>{{ $app['type'] }}</td>
                                <td>{{ $app['start_date'] }}</td>
                                <td>{{ $app['end_date'] }}</td>
                                <td>{{ $app['days'] }}</td>
                                <td>{{ $app['reason'] }}</td>
                                <td>{{ $app['approved_by'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($app['approval_date'])->format('d M Y') }}</td>
                                <td>{{ $app['comment'] }}</td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="detailsModal{{ $app['id'] }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $app['id'] }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success text-white">
                                            <h5 class="modal-title" id="detailsModalLabel{{ $app['id'] }}">
                                                {{ $app['employee'] }} - {{ $app['type'] }}
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Type:</strong> {{ $app['type'] }}</p>
                                            <p><strong>From:</strong> {{ $app['start_date'] }} | <strong>To:</strong> {{ $app['end_date'] }}</p>
                                            <p><strong>Total Days:</strong> {{ $app['days'] }}</p>
                                            <p><strong>Reason:</strong> {{ $app['reason'] }}</p>
                                            <p><strong>Approved By:</strong> {{ $app['approved_by'] }}</p>
                                            <p><strong>Approval Date:</strong> {{ \Carbon\Carbon::parse($app['approval_date'])->format('d M Y') }}</p>
                                            <p><strong>Comment:</strong> {{ $app['comment'] }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
