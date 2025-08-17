@php
    $sampleLeaves = [
        [
            'employee' => 'John Doe',
            'type' => 'Annual Leave',
            'start' => '2025-07-01',
            'end' => '2025-07-05',
            'days' => 5,
            'reason' => 'Vacation',
        ],
        [
            'employee' => 'Jane Smith',
            'type' => 'Sick Leave',
            'start' => '2025-07-03',
            'end' => '2025-07-04',
            'days' => 2,
            'reason' => 'Flu',
        ],
        [
            'employee' => 'Michael Johnson',
            'type' => 'Casual Leave',
            'start' => '2025-07-07',
            'end' => '2025-07-07',
            'days' => 1,
            'reason' => 'Personal work',
        ],
    ];
@endphp

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Employee</th>
            <th>Leave Type</th>
            <th>From</th>
            <th>To</th>
            <th>Days</th>
            <th>Reason</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sampleLeaves as $index => $leave)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $leave['employee'] }}</td>
                <td>{{ $leave['type'] }}</td>
                <td>{{ \Carbon\Carbon::parse($leave['start'])->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($leave['end'])->format('d M Y') }}</td>
                <td>{{ $leave['days'] }}</td>
                <td>{{ $leave['reason'] }}</td>
                <td>
                        <span class="badge
                            @if($type == 'Approved') bg-success
                            @elseif($type == 'Rejected') bg-danger
                            @elseif($type == 'Adjusted') bg-warning
                            @else bg-primary
                            @endif">
                            {{ $type }}
                        </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
