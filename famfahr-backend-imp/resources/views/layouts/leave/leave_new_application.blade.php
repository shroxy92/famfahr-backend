@extends('layouts.master')
@section('title', 'Apply for Leave')

@section('content')
    <style>
        body {
            background-color: #f4fdf9;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background: #a8e6cf;
            color: #2d5c4d;
            font-weight: 600;
            font-size: 18px;
        }

        .form-label {
            font-weight: 500;
            color: #2f4f4f;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #cdeede;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.15rem rgba(56, 199, 145, 0.25);
            border-color: #3cbf99;
        }

        .btn-success {
            background-color: #3cbf99;
            border: none;
        }

        .btn-success:hover {
            background-color: #33a885;
        }

        .leave-icon {
            font-size: 1.2rem;
            margin-right: 8px;
            color: #3cbf99;
        }

        .badge {
            background-color: #3cbf99;
        }
    </style>

    <div class="container py-5">
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-clipboard-check leave-icon"></i> Leave Application Form
                    </div>
                    <div class="card-body px-4 py-4">
                        {{-- @if(session('message')) --}}
                        {{--     <div class="alert alert-success">{{ session('message') }}</div> --}}
                        {{-- @endif --}}
                        {{-- <form action="{{ route('leave.store') }}" method="POST"> --}}
                        {{--     @csrf --}}
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="bi bi-list-ul leave-icon"></i>Leave Type <span class="text-danger">*</span>
                                    </label>
                                    <select name="leave_type" class="form-select" required>
                                        <option value="">-- Select Leave Type --</option>
                                        <option value="casual">Casual Leave</option>
                                        <option value="sick">Sick Leave</option>
                                        <option value="earned">Earned Leave</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">
                                        <i class="bi bi-calendar-event leave-icon"></i>Start Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">
                                        <i class="bi bi-calendar-check leave-icon"></i>End Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-chat-dots leave-icon"></i>Reason <span class="text-danger">*</span>
                                </label>
                                <textarea name="reason" class="form-control" rows="4" required placeholder="Enter the reason for your leave..."></textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4 py-2">
                                    <i class="bi bi-send-check-fill me-1"></i> Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Leave Balance Sidebar -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-bar-chart-fill leave-icon"></i> Your Leave Balance
                    </div>
                    <div class="card-body">
                        @php
                            $leave_balance = [
                                'Casual Leave' => 5,
                                'Sick Leave' => 8,
                                'Earned Leave' => 12
                            ];
                        @endphp
                        <ul class="list-group list-group-flush">
                            @foreach($leave_balance as $type => $days)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $type }}
                                    <span class="badge rounded-pill">{{ $days }} Days</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
