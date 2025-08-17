@extends('layouts.master')

@section('title', 'Duty Approval Dashboard')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-success fw-bold">Pending Duty Requests</h4>

            {{-- Filters (extendable) --}}
            <form method="GET" class="d-flex gap-2">
                <select name="type" class="form-select form-select-sm w-auto">
                    <option value="">All Types</option>
                    <option value="extra">Extra Duty</option>
                    <option value="holiday">Holiday Duty</option>
                    <option value="latenight">Late Night</option>
                </select>
                <button class="btn btn-outline-success btn-sm" type="submit">Filter</button>
            </form>
        </div>

        <div class="table-responsive shadow-sm border border-success rounded">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-success text-dark">
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $requests = [
                        [
                            'id' => 1,
                            'type' => 'extra',
                            'date' => '2025-07-13',
                            'user' => ['name' => 'John Doe'],
                            'start_time' => '08:00',
                            'end_time' => '12:00',
                            'task_description' => 'Server maintenance and backup.',
                            'approved_by_lead' => true,
                            'status' => 'pending',
                        ],
                        [
                            'id' => 2,
                            'type' => 'holiday',
                            'date' => '2025-07-14',
                            'user' => ['name' => 'Jane Smith'],
                            'holiday_type' => 'public',
                            'reason' => 'System monitoring on national holiday.',
                            'status' => 'pending',
                        ],
                        [
                            'id' => 3,
                            'type' => 'latenight',
                            'date' => '2025-07-12',
                            'user' => ['name' => 'Mike Johnson'],
                            'from_time' => '22:00',
                            'to_time' => '02:00',
                            'reason' => 'Late deployment support.',
                            'transport_required' => true,
                            'status' => 'pending',
                        ]
                    ];
                @endphp

                @forelse ($requests as $i => $request)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $request['user']['name'] }}</td>
                        <td>
                            <span class="badge bg-light text-success text-capitalize">{{ $request['type'] }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($request['date'])->format('d M Y') }}</td>
                        <td>
                            @if ($request['type'] === 'extra')
                                <small>
                                    <strong>Time:</strong> {{ $request['start_time'] }} - {{ $request['end_time'] }}<br>
                                    <strong>Lead Approved:</strong> {{ $request['approved_by_lead'] ? 'Yes' : 'No' }}<br>
                                    <strong>Task:</strong> {{ $request['task_description'] }}
                                </small>
                            @elseif ($request['type'] === 'holiday')
                                <small>
                                    <strong>Holiday Type:</strong> {{ ucfirst($request['holiday_type']) }}<br>
                                    <strong>Reason:</strong> {{ $request['reason'] ?? 'N/A' }}
                                </small>
                            @elseif ($request['type'] === 'latenight')
                                <small>
                                    <strong>Time:</strong> {{ $request['from_time'] }} - {{ $request['to_time'] }}<br>
                                    <strong>Transport:</strong> {{ $request['transport_required'] ? 'Yes' : 'No' }}<br>
                                    <strong>Reason:</strong> {{ $request['reason'] ?? 'N/A' }}
                                </small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-warning text-dark">{{ ucfirst($request['status']) }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                {{-- Approve --}}
                                <form method="POST" action="#">
                                    @csrf
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Approve">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                </form>

                                {{-- Reject --}}
                                <form method="POST" action="#">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Reject">
                                        <i class="bi bi-x-circle"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No pending requests found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination placeholder --}}
        <div class="mt-3 d-flex justify-content-end">
            {{-- {{ $requests->links() }} --}}
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link">Next</a></li>
                </ul>
            </nav>
        </div>

    </div>
@endsection




{{--@extends('layouts.master')--}}

{{--@section('title', 'Duty Request Approvals')--}}

{{--@section('content')--}}
{{--    <div class="container py-5">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-10">--}}

{{--                <h3 class="mb-4 text-center text-success fw-bold">Pending Duty Requests</h3>--}}

{{--                --}}{{-- Loop Through Requests --}}
{{--                @foreach ($requests as $request)--}}
{{--                    <div class="card mb-4 shadow-sm border border-success">--}}
{{--                        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">--}}
{{--                        <span>--}}
{{--                            {{ ucfirst($request->type) }} Duty Request - {{ \Carbon\Carbon::parse($request->date)->format('M d, Y') }}--}}
{{--                        </span>--}}
{{--                            <span class="badge bg-light text-success">{{ strtoupper($request->status) }}</span>--}}
{{--                        </div>--}}

{{--                        <div class="card-body">--}}

{{--                            <p><strong>Requested By:</strong> {{ $request->user->name ?? 'Unknown User' }}</p>--}}
{{--                            <p><strong>Date:</strong> {{ $request->date }}</p>--}}

{{--                            @if ($request->type === 'extra')--}}
{{--                                <p><strong>Time:</strong> {{ $request->start_time }} to {{ $request->end_time }}</p>--}}
{{--                                <p><strong>Task Description:</strong> {{ $request->task_description }}</p>--}}
{{--                                <p><strong>Lead Approval:</strong> {{ $request->approved_by_lead ? 'Yes' : 'No' }}</p>--}}

{{--                            @elseif ($request->type === 'holiday')--}}
{{--                                <p><strong>Holiday Type:</strong> {{ ucfirst($request->holiday_type) }}</p>--}}
{{--                                <p><strong>Reason:</strong> {{ $request->reason ?? 'N/A' }}</p>--}}

{{--                            @elseif ($request->type === 'latenight')--}}
{{--                                <p><strong>Time:</strong> {{ $request->from_time }} to {{ $request->to_time }}</p>--}}
{{--                                <p><strong>Reason:</strong> {{ $request->reason ?? 'N/A' }}</p>--}}
{{--                                <p><strong>Transport Required:</strong> {{ $request->transport_required ? 'Yes' : 'No' }}</p>--}}
{{--                            @endif--}}

{{--                            --}}{{-- Action Buttons --}}
{{--                            <form action="{{ route('duty-requests.approval', $request->id) }}" method="POST" class="d-flex mt-3 gap-2">--}}
{{--                                @csrf--}}
{{--                                @method('PATCH')--}}
{{--                                <input type="hidden" name="action" value="approve">--}}
{{--                                <button type="submit" class="btn btn-outline-success w-50">--}}
{{--                                    <i class="bi bi-check-circle me-1"></i> Approve--}}
{{--                                </button>--}}
{{--                            </form>--}}

{{--                            <form action="{{ route('duty-requests.approval', $request->id) }}" method="POST" class="d-flex mt-2 gap-2">--}}
{{--                                @csrf--}}
{{--                                @method('PATCH')--}}
{{--                                <input type="hidden" name="action" value="reject">--}}
{{--                                <button type="submit" class="btn btn-outline-danger w-50">--}}
{{--                                    <i class="bi bi-x-circle me-1"></i> Reject--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--                @if ($requests->isEmpty())--}}
{{--                    <div class="alert alert-info text-center">--}}
{{--                        No pending duty requests at the moment.--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
