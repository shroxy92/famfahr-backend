@extends('layouts.master')
@section('title', 'Apply for Leave')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
                <div class="container py-5">
                    <div class="row">
                        {{-- Leave Application Form --}}
                        <div class="col-md-8">
                            <div class="card shadow-sm border-0 mb-4">
                                <div class="card-header bg-primary text-white d-flex align-items-center">
                                    <i class="bi bi-pencil-square me-2"></i>
                                    <h5 class="mb-0">Leave Application</h5>
                                </div>
                                <div class="card-body">
{{--                                    @if(session('message'))--}}
{{--                                        <div class="alert alert-success">{{ session('message') }}</div>--}}
{{--                                    @endif--}}

{{--                                    <form action="{{ route('leave.store') }}" method="POST">--}}
{{--                                        @csrf--}}
                                    <form action="" method="POST">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Leave Type <span class="text-danger">*</span></label>
                                                <select name="leave_type" class="form-select" required>
                                                    <option value="">-- Select Leave Type --</option>
                                                    <option value="casual">Casual Leave</option>
                                                    <option value="sick">Sick Leave</option>
                                                    <option value="earned">Earned Leave</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                                <input type="date" name="start_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                <input type="date" name="end_date" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <label class="form-label">Reason for Leave <span class="text-danger">*</span></label>
                                            <textarea name="reason" class="form-control" rows="4" required placeholder="Write a brief reason..."></textarea>
                                        </div>

                                        <div class="mt-4 text-end">
                                            <button type="submit" class="btn btn-success px-4">
                                                <i class="bi bi-send-check me-1"></i> Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Sidebar Leave Balance --}}
                        <div class="col-md-4">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-secondary text-white">
                                    <i class="bi bi-pie-chart-fill me-2"></i> Leave Balance
                                </div>
                                <div class="card-body">
                                    @php
                                        $leave_balance = [
                                            'Casual Leave' => 5,
                                            'Sick Leave' => 8,
                                            'Earned Leave' => 12
                                        ];
                                    @endphp
                                    <ul class="list-group">
                                        @foreach($leave_balance as $type => $days)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{ $type }}
                                                <span class="badge bg-primary rounded-pill">{{ $days }} Days</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-1"></div>
    </div>
@endsection
