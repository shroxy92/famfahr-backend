@extends('layouts.master')

@section('title', 'Application Details')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                {{-- Sample Application Info --}}
                @php
                    $application = (object)[
                        'type' => 'latenight', // 'holiday', 'extra'
                        'employee_name' => 'John Doe',
                        'employee_id' => 'EMP123',
                        'duty_date' => '2025-07-06',
                        'from_time' => '22:00',
                        'to_time' => '23:59',
                        'holiday_type' => 'public',
                        'start_time' => '10:00',
                        'end_time' => '14:00',
                        'task_description' => 'Server Maintenance',
                        'reason' => 'Urgent patch release',
                        'approvals' => [
                            (object)[
                                'role' => 'Dept. Lead',
                                'approver_name' => 'Alice Smith',
                                'status' => 'Approved',
                                'approved_at' => '2025-07-06 10:00:00',
                                'remarks' => 'Go ahead'
                            ],
                            (object)[
                                'role' => 'HR Admin',
                                'approver_name' => 'Bob Green',
                                'status' => 'Pending',
                                'approved_at' => null,
                                'remarks' => null
                            ],
                            (object)[
                                'role' => 'Management',
                                'approver_name' => 'Charles King',
                                'status' => 'Pending',
                                'approved_at' => null,
                                'remarks' => null
                            ]
                        ]
                    ];

                    function statusClass($status) {
                        return match(strtolower($status)) {
                            'approved' => 'success',
                            'pending' => 'warning',
                            'rejected' => 'danger',
                            default => 'secondary'
                        };
                    }
                @endphp

                {{-- Main Info Card --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-file-earmark-text me-2"></i>{{ ucfirst($application->type) }} Duty Application</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-4">Employee Name:</dt>
                            <dd class="col-sm-8">{{ $application->employee_name }}</dd>

                            <dt class="col-sm-4">Employee ID:</dt>
                            <dd class="col-sm-8">{{ $application->employee_id }}</dd>

                            <dt class="col-sm-4">Date of Duty:</dt>
                            <dd class="col-sm-8">{{ \Carbon\Carbon::parse($application->duty_date)->format('d M Y') }}</dd>

                            @if($application->type === 'latenight')
                                <dt class="col-sm-4">Time:</dt>
                                <dd class="col-sm-8">{{ $application->from_time }} - {{ $application->to_time }}</dd>
                                <dt class="col-sm-4">Reason:</dt>
                                <dd class="col-sm-8">{{ $application->reason }}</dd>
                            @elseif($application->type === 'extra')
                                <dt class="col-sm-4">Time:</dt>
                                <dd class="col-sm-8">{{ $application->start_time }} - {{ $application->end_time }}</dd>
                                <dt class="col-sm-4">Task:</dt>
                                <dd class="col-sm-8">{{ $application->task_description }}</dd>
                            @elseif($application->type === 'holiday')
                                <dt class="col-sm-4">Holiday Type:</dt>
                                <dd class="col-sm-8 text-capitalize">{{ $application->holiday_type }}</dd>
                                <dt class="col-sm-4">Reason:</dt>
                                <dd class="col-sm-8">{{ $application->reason }}</dd>
                            @endif
                        </dl>
                    </div>
                </div>

                {{-- Approval Workflow --}}
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="bi bi-check2-circle me-2"></i>Approval Workflow</h5>
                    </div>
                    <div class="card-body">
                        @foreach($application->approvals as $approval)
                            <div class="d-flex justify-content-between align-items-center border-bottom py-3">
                                <div>
                                    <h6 class="mb-1">{{ $approval->role }}</h6>
                                    <small class="text-muted">
                                        Approver: <strong>{{ $approval->approver_name }}</strong>
                                    </small><br>
                                    @if($approval->remarks)
                                        <small class="text-muted">Remarks: "{{ $approval->remarks }}"</small>
                                    @endif
                                </div>
                                <div class="text-end">
                                <span class="badge bg-{{ statusClass($approval->status) }}">
                                    {{ ucfirst($approval->status) }}
                                </span>
                                    @if($approval->approved_at)
                                        <div class="text-muted small">{{ \Carbon\Carbon::parse($approval->approved_at)->format('d M Y h:i A') }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
