@extends('layouts.master')

@section('title', 'Manual Attendance Approvals')

@section('content')
    <div class="container py-4">
        <h4 class="text-success fw-bold mb-3">Pending Manual Attendance Requests</h4>

        @php
            // Sample Data
            $requests = [
                [
                    'id' => 1,
                    'employee_name' => 'John Doe',
                    'type' => 'in',
                    'time' => '09:12',
                    'date' => '2025-07-14',
                    'remarks' => 'Missed check-in due to device issue',
                ],
                [
                    'id' => 2,
                    'employee_name' => 'Jane Smith',
                    'type' => 'out',
                    'time' => '18:05',
                    'date' => '2025-07-13',
                    'remarks' => '',
                ],
            ];
        @endphp

        @if(count($requests) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle shadow-sm">
                    <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Remarks</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($requests as $index => $request)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $request['employee_name'] }}</td>
                            <td>
                                <span class="badge bg-{{ $request['type'] === 'in' ? 'success' : 'info' }}">
                                    {{ strtoupper($request['type']) }}
                                </span>
                            </td>
                            <td>{{ $request['time'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($request['date'])->format('d M Y') }}</td>
                            <td>
                                @if($request['remarks'])
                                    <span class="text-muted fst-italic">{{ $request['remarks'] }}</span>
                                @else
                                    <span class="text-secondary">—</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form method="POST" action="#" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="request_id" value="{{ $request['id'] }}">
                                    <input type="hidden" name="type" value="{{ $request['type'] }}">

                                    <button type="submit" name="action" value="approve" class="btn btn-sm btn-success">
                                        Approve
                                    </button>
                                    <button type="submit" name="action" value="reject" class="btn btn-sm btn-outline-danger">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                No pending attendance requests at the moment.
            </div>
        @endif
    </div>
@endsection
