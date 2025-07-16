@extends('layouts.master')

@section('title', 'Roster Detail')

@section('content')
    <div class="container py-4">
        @php $user = ['name' => 'John Doe']; @endphp
        <h4 class="text-success fw-bold mb-3">Roster Details: <span class="text-muted">{{ $user['name'] }}</span></h4>

        <div class="table-responsive border border-success rounded shadow-sm">
            <table class="table table-bordered align-middle">
                <thead class="table-success text-dark">
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Time / Task</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $user = ['name' => 'John Doe'];
                    $duties = [
                        [
                            'date' => '2025-07-01',
                            'type' => 'extra',
                            'start' => '09:00',
                            'end' => '13:00',
                            'task' => 'Server maintenance',
                            'status' => 'approved',
                        ],
                        [
                            'date' => '2025-07-03',
                            'type' => 'holiday',
                            'holiday_type' => 'public',
                            'reason' => 'National Holiday Monitoring',
                            'status' => 'approved',
                        ],
                        [
                            'date' => '2025-07-05',
                            'type' => 'latenight',
                            'start' => '22:00',
                            'end' => '02:00',
                            'reason' => 'Security Patch Rollout',
                            'transport_required' => true,
                            'status' => 'approved',
                        ]
                    ];
                @endphp

                @foreach ($duties as $duty)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($duty['date'])->format('d M Y') }}</td>
                        <td class="text-capitalize">{{ $duty['type'] }}</td>
                        <td>
                            @if ($duty['type'] === 'extra')
                                {{ $duty['start'] }} - {{ $duty['end'] }}<br>
                                <small>{{ $duty['task'] }}</small>
                            @elseif ($duty['type'] === 'holiday')
                                <small>{{ ucfirst($duty['holiday_type']) }}</small>
                            @elseif ($duty['type'] === 'latenight')
                                {{ $duty['start'] }} - {{ $duty['end'] }}<br>
                                <small>Transport: {{ $duty['transport_required'] ? 'Yes' : 'No' }}</small>
                            @endif
                        </td>
                        <td>{{ $duty['reason'] ?? 'N/A' }}</td>
                        <td>
                            <span class="badge {{ $duty['status'] === 'approved' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($duty['status']) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ url('reports_roster') }}" class="btn btn-outline-success mt-3">
            ← Back to Report
        </a>
    </div>
@endsection
