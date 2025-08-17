@extends('layouts.master')

@section('title', 'Approved Manual Attendance')

@section('content')
    <div class="container py-4">
        <h4 class="text-success fw-bold mb-3">Approved Manual Attendance</h4>

        @php
            // Sample Approved Data
            $approved = [
                [
                    'employee_name' => 'John Doe',
                    'type' => 'in',
                    'time' => '09:12',
                    'date' => '2025-07-14',
                    'approved_by' => 'Team Lead A',
                    'approved_at' => '2025-07-14 10:02:15',
                ],
                [
                    'employee_name' => 'Jane Smith',
                    'type' => 'out',
                    'time' => '18:05',
                    'date' => '2025-07-13',
                    'approved_by' => 'Team Lead B',
                    'approved_at' => '2025-07-13 18:30:00',
                ],
            ];
        @endphp

        @if(count($approved) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle shadow-sm">
                    <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Approved By</th>
                        <th>Approved At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($approved as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['employee_name'] }}</td>
                            <td>
                                <span class="badge bg-{{ $item['type'] === 'in' ? 'success' : 'info' }}">
                                    {{ strtoupper($item['type']) }}
                                </span>
                            </td>
                            <td>{{ $item['time'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($item['date'])->format('d M Y') }}</td>
                            <td>{{ $item['approved_by'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($item['approved_at'])->format('d M Y h:i A') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">
                No approved attendance entries found.
            </div>
        @endif
    </div>
@endsection
