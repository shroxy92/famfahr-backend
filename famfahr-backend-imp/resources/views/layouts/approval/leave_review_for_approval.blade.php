@extends('layouts.master')
@section('title', 'Apply for Leave')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="container py-5">
                <div class="row mb-4">
                    <div class="col-md-8">
                        <h3><i class="bi bi-file-earmark-text me-2"></i>Review Application</h3>
                        <p class="text-muted">Please review the details and take action.</p>
                    </div>
                </div>

                @php
                    // Sample application data
                    $application = (object)[
                        'id' => 1,
                        'type' => 'leave',
                        'employee' => (object)['name' => 'John Doe'],
                        'start_date' => '2025-07-10',
                        'end_date' => '2025-07-12',
                        'days' => 3,
                        'reason' => 'Family trip',
                        'status' => 'pending',
                    ];

                    // Approval timeline
                    $approvalHistory = [
                        ['approver' => 'Team Lead', 'status' => 'approved', 'comment' => 'All good.', 'date' => '2025-07-08'],
                        ['approver' => 'HR Manager', 'status' => 'pending', 'comment' => null, 'date' => null],
                    ];
                @endphp

                <div class="row g-4">
                    {{-- Left: Details --}}
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-person-lines-fill me-1"></i> Application Details
                            </div>
                            <div class="card-body">
                                <p><strong>Employee:</strong> {{ $application->employee->name }}</p>
                                <p><strong>Type:</strong> {{ ucfirst($application->type) }}</p>
                                <p><strong>From:</strong> {{ \Carbon\Carbon::parse($application->start_date)->format('d M Y') }}</p>
                                <p><strong>To:</strong> {{ \Carbon\Carbon::parse($application->end_date)->format('d M Y') }}</p>
                                <p><strong>Total Days:</strong> {{ $application->days }}</p>
                                <p><strong>Reason:</strong> {{ $application->reason }}</p>
                                <p><strong>Status:</strong>
                                    <span class="badge bg-warning text-dark">{{ ucfirst($application->status) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Right: Timeline & Action --}}
                    <div class="col-md-6">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-info text-white">
                                <i class="bi bi-clock-history me-1"></i> Approval Timeline
                            </div>
                            <div class="card-body">
                                <ul class="timeline list-unstyled">
                                    @foreach($approvalHistory as $step)
                                        <li class="mb-4 position-relative ps-4 border-start">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <strong>{{ $step['approver'] }}</strong>
                                                <span class="badge
                                        @if($step['status'] === 'approved') bg-success
                                        @elseif($step['status'] === 'rejected') bg-danger
                                        @else bg-secondary
                                        @endif">
                                        {{ ucfirst($step['status']) }}
                                    </span>
                                            </div>
                                            <div class="mt-1 text-muted small">
                                                {{ $step['comment'] ?? 'No comments' }}<br>
                                                @if($step['date'])
                                                    <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($step['date'])->format('d M Y') }}
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        {{-- Action Form --}}
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <i class="bi bi-pencil-square me-1"></i> Your Action
                            </div>
                            <div class="card-body">
                                <form method="POST" action="#">
                                    {{-- Simulate POST --}}
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Decision</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="">-- Choose --</option>
                                            <option value="approved">Approve</option>
                                            <option value="rejected">Reject</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Your Comment</label>
                                        <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Optional remarks..."></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-1"></i>Submit</button>
                                    <a href="{{ url('/applications') }}" class="btn btn-outline-secondary ms-2">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .timeline li::before {
                    content: '';
                    position: absolute;
                    top: 4px;
                    left: -7px;
                    width: 14px;
                    height: 14px;
                    background: #0d6efd;
                    border-radius: 50%;
                    z-index: 1;
                }
            </style>
    </div>
    <div class="col-1"></div>
    </div>
@endsection
