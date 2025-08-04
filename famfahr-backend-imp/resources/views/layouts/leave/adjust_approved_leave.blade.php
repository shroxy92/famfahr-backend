@extends('layouts.master')
@section('title', 'Adjust Approved Leave')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-sliders2-vertical me-2"></i>Adjust Approved Leave</h5>
            </div>
            <div class="card-body">

                @php
                    use Carbon\Carbon;
                    $approvedLeaves = [
                        ['id' => 101, 'type' => 'Casual', 'start' => '2025-07-10', 'end' => '2025-07-12', 'reason' => 'Family Event'],
                        ['id' => 102, 'type' => 'Sick', 'start' => '2025-07-15', 'end' => '2025-07-15', 'reason' => 'Checkup'],
                    ];
                    function getDays($start, $end) {
                        return Carbon::parse($start)->diffInDays(Carbon::parse($end)) + 1;
                    }
                @endphp

                @if (count($approvedLeaves))
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Leave Type</th>
                                <th>Date Range</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($approvedLeaves as $leave)
                                <tr>
                                    <td>{{ $leave['id'] }}</td>
                                    <td>{{ $leave['type'] }}</td>
                                    <td>{{ Carbon::parse($leave['start'])->format('d M Y') }} - {{ Carbon::parse($leave['end'])->format('d M Y') }}</td>
                                    <td>{{ getDays($leave['start'], $leave['end']) }}</td>
                                    <td>{{ $leave['reason'] }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editLeaveModal{{ $leave['id'] }}">
                                            <i class="bi bi-pencil-square me-1"></i>Adjust
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal --}}
                                <div class="modal fade" id="editLeaveModal{{ $leave['id'] }}" tabindex="-1" aria-labelledby="editLeaveLabel{{ $leave['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
{{--                                            <form action="{{ route('leave.approved.adjust.update', $leave['id']) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
                                            <form action="" method="POST">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="editLeaveLabel{{ $leave['id'] }}">
                                                        <i class="bi bi-pencil-fill me-1"></i> Adjust Leave #{{ $leave['id'] }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Leave Type</label>
                                                            <select name="leave_type" class="form-select" required>
                                                                <option value="Casual" {{ $leave['type']=='Casual' ? 'selected' : '' }}>Casual Leave</option>
                                                                <option value="Sick" {{ $leave['type']=='Sick' ? 'selected' : '' }}>Sick Leave</option>
                                                                <option value="Earned" {{ $leave['type']=='Earned' ? 'selected' : '' }}>Earned Leave</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">Start Date</label>
                                                            <input type="date" name="start_date" class="form-control" value="{{ $leave['start'] }}" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">End Date</label>
                                                            <input type="date" name="end_date" class="form-control" value="{{ $leave['end'] }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Reason</label>
                                                        <textarea name="reason" rows="3" class="form-control" required>{{ $leave['reason'] }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-success">
                                                        <i class="bi bi-save2 me-1"></i>Save Changes
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-1"></i> No approved leaves available for adjustment.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
