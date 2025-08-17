@extends('layouts.master')
@section('title', 'Adjust Applied Leave')

@section('content')


    @section('content')
        <div class="container py-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Adjust Applied Leave</h5>
                </div>
                <div class="card-body">

                    @php
                        use Carbon\Carbon;

                        $leaves = [
                            ['id' => 1, 'type' => 'Casual', 'start' => '2025-07-10', 'end' => '2025-07-12', 'reason' => 'Family trip', 'status' => 'Pending'],
                            ['id' => 2, 'type' => 'Sick', 'start' => '2025-07-15', 'end' => '2025-07-15', 'reason' => 'Flu recovery', 'status' => 'Pending'],
                        ];

                        function getDays($start, $end) {
                            return Carbon::parse($start)->diffInDays(Carbon::parse($end)) + 1;
                        }
                    @endphp

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Leave Type</th>
                                <th>Dates</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($leaves as $leave)
                                <tr>
                                    <td>{{ $leave['id'] }}</td>
                                    <td>{{ $leave['type'] }}</td>
                                    <td>
                                        {{ Carbon::parse($leave['start'])->format('d M Y') }} -
                                        {{ Carbon::parse($leave['end'])->format('d M Y') }}
                                    </td>
                                    <td>{{ getDays($leave['start'], $leave['end']) }}</td>
                                    <td>{{ $leave['reason'] }}</td>
                                    <td><span class="badge bg-warning text-dark">{{ $leave['status'] }}</span></td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editLeaveModal{{ $leave['id'] }}">
                                            <i class="bi bi-pencil me-1"></i>Edit
                                        </button>

                                        <!-- Cancel Option (Optional) -->
{{--                                        <form action="{{ route('leave.cancel', $leave['id']) }}" method="POST" class="d-inline">--}}
{{--                                            @csrf--}}
                                        <form action="" method="POST">
                                            <button onclick="return confirm('Cancel this leave?')" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-x-lg me-1"></i>Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal for Editing --}}
                                <div class="modal fade" id="editLeaveModal{{ $leave['id'] }}" tabindex="-1" aria-labelledby="editLeaveLabel{{ $leave['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
{{--                                            <form action="{{ route('leave.adjust.update', $leave['id']) }}" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
                                            <form action="" method="POST">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="editLeaveLabel{{ $leave['id'] }}"><i class="bi bi-pencil-square me-1"></i>Edit Leave #{{ $leave['id'] }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label">Leave Type</label>
                                                            <select name="leave_type" class="form-select" required>
                                                                <option value="casual" {{ $leave['type']=='Casual'?'selected':'' }}>Casual Leave</option>
                                                                <option value="sick" {{ $leave['type']=='Sick'?'selected':'' }}>Sick Leave</option>
                                                                <option value="earned" {{ $leave['type']=='Earned'?'selected':'' }}>Earned Leave</option>
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
                                                    <button class="btn btn-success"><i class="bi bi-save2 me-1"></i>Save</button>
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

                </div>
            </div>
        </div>
    @endsection

@endsection
