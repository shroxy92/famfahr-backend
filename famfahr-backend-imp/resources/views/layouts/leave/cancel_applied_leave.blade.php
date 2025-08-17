@extends('layouts.master')
@section('title', 'Cancel Leave Applications')

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Main Leave List --}}
            <div class="col-md-9">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-x-circle me-2"></i>Cancel Leave Applications</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $leaves = [
                                ['id' => 1, 'type' => 'Casual', 'start' => '2025-07-15', 'end' => '2025-07-17', 'status' => 'Pending'],
                                ['id' => 2, 'type' => 'Sick', 'start' => '2025-07-05', 'end' => '2025-07-06', 'status' => 'Approved'],
                                ['id' => 3, 'type' => 'Earned', 'start' => '2025-06-20', 'end' => '2025-06-25', 'status' => 'Rejected'],
                            ];
                            function statusBadge($status) {
                                return match(strtolower($status)) {
                                    'approved' => 'success',
                                    'pending' => 'warning',
                                    'rejected' => 'danger',
                                    default => 'secondary'
                                };
                            }
                        @endphp

                        <div class="table-responsive">
                            <table class="table align-middle table-bordered">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Leave Type</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($leaves as $leave)
                                    <tr>
                                        <td>{{ $leave['id'] }}</td>
                                        <td>{{ $leave['type'] }} Leave</td>
                                        <td>{{ \Carbon\Carbon::parse($leave['start'])->format('d M Y') }} to {{ \Carbon\Carbon::parse($leave['end'])->format('d M Y') }}</td>
                                        <td><span class="badge bg-{{ statusBadge($leave['status']) }}">{{ $leave['status'] }}</span></td>
                                        <td>
                                            @if($leave['status'] === 'Pending')
{{--                                                <form action="{{ route('leave.cancel', $leave['id']) }}" method="POST">--}}
{{--                                                    @csrf--}}
                                                <form action="" method="POST">
                                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to cancel this leave?')">
                                                        <i class="bi bi-x-lg me-1"></i> Cancel
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted">Not cancellable</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="text-center">No leave applications found.</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Optional Sidebar Filters --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-funnel me-1"></i>Filters</strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Leave Type</label>
                                <select class="form-select">
                                    <option value="">All</option>
                                    <option value="Casual">Casual</option>
                                    <option value="Sick">Sick</option>
                                    <option value="Earned">Earned</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">From</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">To</label>
                                <input type="date" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-outline-primary w-100">
                                <i class="bi bi-search me-1"></i> Apply Filter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
