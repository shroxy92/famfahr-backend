@extends('layouts.master')

@section('title', 'Approved / Rejected Requests')

@section('content')
    <div class="row">
        <div class="col-1"></div>

        <div class="col-10">
            <div class="container py-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-check2-circle me-2"></i>My Processed Requests</h5>

                        {{-- Filter --}}
                        <form method="GET" class="d-flex gap-2">
                            <select name="status" class="form-select form-select-sm w-auto">
                                <option value="">All</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            <button class="btn btn-light btn-sm" type="submit">Filter</button>
                        </form>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-success text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Processed On</th>
                                </tr>
                                </thead>
                                <tbody>
                                                                @php
                                                                    $approvedRequests = [
                                                                        [
                                                                            'id' => 1,
                                                                            'user' => ['name' => 'John Doe'],
                                                                            'type' => 'extra',
                                                                            'date' => '2025-07-10',
                                                                            'start_time' => '08:00',
                                                                            'end_time' => '12:00',
                                                                            'task_description' => 'DB optimization task.',
                                                                            'status' => 'approved',
                                                                            'processed_at' => '2025-07-11 09:30',
                                                                        ],
                                                                        [
                                                                            'id' => 2,
                                                                            'user' => ['name' => 'Jane Smith'],
                                                                            'type' => 'holiday',
                                                                            'date' => '2025-07-08',
                                                                            'holiday_type' => 'public',
                                                                            'reason' => 'Monitoring during national holiday.',
                                                                            'status' => 'approved',
                                                                            'processed_at' => '2025-07-09 14:15',
                                                                        ],
                                                                        [
                                                                            'id' => 3,
                                                                            'user' => ['name' => 'Mike Johnson'],
                                                                            'type' => 'latenight',
                                                                            'date' => '2025-07-06',
                                                                            'from_time' => '22:00',
                                                                            'to_time' => '02:00',
                                                                            'reason' => 'Patch release monitoring.',
                                                                            'transport_required' => true,
                                                                            'status' => 'rejected',
                                                                            'processed_at' => '2025-07-07 17:00',
                                                                        ]
                                                                    ];
                                                                @endphp

                                @forelse ($approvedRequests as $i => $request)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $request['user']['name'] }}</td>
                                        <td>
                                            <span class="badge bg-light text-success text-capitalize">{{ $request['type']  }}</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($request['date'])->format('d M Y') }}</td>
                                        <td>
                                            @if ($request['type'] === 'extra')
                                                <small>
                                                    <strong>Time:</strong> {{ $request['start_time'] }} - {{ $request['end_time'] }}<br>
                                                    <strong>Task:</strong> {{ $request['task_description'] }}
                                                </small>
                                            @elseif ($request['type'] === 'holiday')
                                                <small>
                                                    <strong>Type:</strong> {{ ucfirst($request['holiday_type']) }}<br>
                                                    <strong>Reason:</strong> {{ $request['reason'] }}
                                                </small>
                                            @elseif ($request['type'] === 'latenight')
                                                <small>
                                                    <strong>Time:</strong> {{ $request['from_time'] }} - {{ $request['to_time'] }}<br>
                                                    <strong>Reason:</strong> {{ $request['reason'] }}<br>
                                                    <strong>Transport:</strong> {{ $request['transport_required'] ? 'Yes' : 'No' }}
                                                </small>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($request['status'] === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($request['status'] === 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($request['processed_at'])->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            You haven't processed any requests yet.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>
@endsection
