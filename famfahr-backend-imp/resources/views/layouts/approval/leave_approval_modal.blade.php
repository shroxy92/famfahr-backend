@extends('layouts.master')
@section('title', 'Apply for Leave')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="container py-5">
                <h2 class="mb-4">Pending Applications</h2>

                @php
                    $applications = [
                        [
                            'id' => 1,
                            'employee' => 'John Doe',
                            'type' => 'Casual Leave',
                            'start_date' => '2025-07-10',
                            'end_date' => '2025-07-12',
                            'days' => 3,
                            'reason' => 'Family trip',
                            'status' => 'Pending',
                            'availed' => 7,
                            'balance' => 5,
                            'history' => [
                                ['approver' => 'Team Lead', 'status' => 'approved', 'comment' => 'Looks fine', 'date' => '2025-07-08'],
                                ['approver' => 'Manager', 'status' => 'approved', 'comment' => 'Approved quickly', 'date' => '2025-07-09'],
                                ['approver' => 'HR', 'status' => 'pending', 'comment' => null, 'date' => null],
                            ],
                        ],
                    ];
                @endphp

                <div class="list-group">
                    @foreach($applications as $app)
                        <a href="#"
                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                           data-bs-toggle="modal"
                           data-bs-target="#approvalModal{{ $app['id'] }}">
                            <div>
                                <h5 class="mb-1">{{ $app['employee'] }}</h5>
                                <small>{{ $app['type'] }} — {{ $app['start_date'] }} to {{ $app['end_date'] }}</small>
                            </div>
                            <span class="badge bg-warning text-dark">{{ $app['status'] }}</span>
                        </a>

                        {{-- Modal --}}
                        <div class="modal fade" id="approvalModal{{ $app['id'] }}" tabindex="-1" aria-labelledby="modalLabel{{ $app['id'] }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content shadow">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">
                                            Review {{ $app['type'] }} - {{ $app['employee'] }}
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- Summary --}}
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="border p-3 rounded">
                                                    <h6 class="text-primary"><i class="bi bi-calendar-check me-1"></i> Leave Info</h6>
                                                    <p><strong>Type:</strong> {{ $app['type'] }}</p>
                                                    <p><strong>From:</strong> {{ $app['start_date'] }} <br><strong>To:</strong> {{ $app['end_date'] }}</p>
                                                    <p><strong>Total Days:</strong> {{ $app['days'] }}</p>
                                                    <p><strong>Reason:</strong> {{ $app['reason'] }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="border p-3 rounded bg-light">
                                                    <h6 class="text-info"><i class="bi bi-bar-chart-line me-1"></i> Leave Balance</h6>
                                                    <p><strong>Availed:</strong> {{ $app['availed'] }} days</p>
                                                    <p><strong>Remaining:</strong> {{ $app['balance'] }} days</p>
                                                    <p><strong>Requested:</strong> {{ $app['days'] }} days</p>
                                                    @if($app['balance'] < $app['days'])
                                                        <div class="alert alert-warning p-2 small mt-2">
                                                            ⚠️ Leave request exceeds available balance.
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Timeline --}}
                                        <div class="mb-4">
                                            <h6><i class="bi bi-clock-history me-1"></i> Approval Timeline</h6>
                                            <ul class="timeline list-unstyled">
                                                @foreach($app['history'] as $step)
                                                    <li class="mb-3 position-relative ps-4 border-start">
                                                        <div class="d-flex justify-content-between">
                                                            <strong>{{ $step['approver'] }}</strong>
                                                            <span class="badge
                                                    @if($step['status'] === 'approved') bg-success
                                                    @elseif($step['status'] === 'rejected') bg-danger
                                                    @else bg-secondary
                                                    @endif">
                                                    {{ ucfirst($step['status']) }}
                                                </span>
                                                        </div>
                                                        <div class="text-muted small mt-1">
                                                            {{ $step['comment'] ?? 'No comment' }}<br>
                                                            @if($step['date'])
                                                                <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($step['date'])->format('d M Y') }}
                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        {{-- Action Form --}}
                                        <form>
                                            <h6><i class="bi bi-check2-circle me-1"></i> Your Action</h6>
                                            <div class="mb-3">
                                                <label for="status{{ $app['id'] }}" class="form-label">Decision</label>
                                                <select class="form-select" id="status{{ $app['id'] }}" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="approved">Approve</option>
                                                    <option value="rejected">Reject</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="comment{{ $app['id'] }}" class="form-label">Comment</label>
                                                <textarea class="form-control" id="comment{{ $app['id'] }}" rows="3" placeholder="Optional comment..."></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success"><i class="bi bi-send-check me-1"></i>Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
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
