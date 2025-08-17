@extends('layouts.master')
@section('title', 'Cancel Approved Leave')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-x-circle-fill me-2"></i>Cancel Approved Leaves</h5>
            </div>
            <div class="card-body">

                @php
                    use Carbon\Carbon;

                    // Sample approved leaves (replace with controller data)
                    $approvedLeaves = [
                        ['id' => 1, 'type' => 'Casual', 'start' => '2025-07-01', 'end' => '2025-07-03', 'reason' => 'Family Vacation'],
                        ['id' => 2, 'type' => 'Sick', 'start' => '2025-07-05', 'end' => '2025-07-05', 'reason' => 'Medical Checkup'],
                    ];

                    function calculateDays($start, $end) {
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
                                <th>From</th>
                                <th>To</th>
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
                                    <td>{{ Carbon::parse($leave['start'])->format('d M Y') }}</td>
                                    <td>{{ Carbon::parse($leave['end'])->format('d M Y') }}</td>
                                    <td>{{ calculateDays($leave['start'], $leave['end']) }}</td>
                                    <td>{{ $leave['reason'] }}</td>
                                    <td>
{{--                                        <form action="{{ route('leave.cancel.approved', $leave['id']) }}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
                                        <form action="" method="POST">
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to cancel this approved leave?')">
                                                <i class="bi bi-trash3 me-1"></i> Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-1"></i> No approved leave applications to cancel.
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
