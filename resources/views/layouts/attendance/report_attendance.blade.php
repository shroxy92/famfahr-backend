@extends('layouts.master')

@section('title','Attendance Report')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">🧾 My Attendance Report</h2>

        @php
            // Static Data (Simulating DB results with joined leave data)
            $attendanceData = [
                [
                    'date' => '2025-07-01',
                    'entry' => '09:02',
                    'exit' => '17:00',
                    'status' => 'Present',
                    'leave_type' => null,
                ],
                [
                    'date' => '2025-07-02',
                    'entry' => '09:30',
                    'exit' => '17:15',
                    'status' => 'Delay',
                    'leave_type' => null,
                ],
                [
                    'date' => '2025-07-03',
                    'entry' => '—',
                    'exit' => '—',
                    'status' => 'Absent',
                    'leave_type' => 'Sick',
                ],
                [
                    'date' => '2025-07-04',
                    'entry' => '—',
                    'exit' => '—',
                    'status' => 'Absent',
                    'leave_type' => 'Casual',
                ],
                [
                    'date' => '2025-07-05',
                    'entry' => '—',
                    'exit' => '—',
                    'status' => 'Absent',
                    'leave_type' => null, // Uninformed absence
                ],
            ];
        @endphp

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Attendance Details</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Entry Time</th>
                        <th>Exit Time</th>
                        <th>Working Hours</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attendanceData as $index => $item)
                        @php
                            $entry = $item['entry'];
                            $exit = $item['exit'];
                            $status = $item['status'];
                            $leaveType = $item['leave_type'];

                            $workingHours = '—';
                            if ($entry !== '—' && $exit !== '—') {
                                $start = \Carbon\Carbon::createFromFormat('H:i', $entry);
                                $end = \Carbon\Carbon::createFromFormat('H:i', $exit);
                                $workingHours = $start->diff($end)->format('%H:%I');
                            }

                            $statusLabel = $status;
                            $badgeClass = 'secondary';

                            if ($status === 'Present') {
                                $badgeClass = 'success';
                            } elseif ($status === 'Delay') {
                                $badgeClass = 'warning';
                            } elseif ($status === 'Absent') {
                                $badgeClass = 'danger';
                                if ($leaveType) {
                                    $statusLabel .= " ({$leaveType} Leave)";
                                } else {
                                    $statusLabel .= " (Uninformed)";
                                }
                            }
                        @endphp

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['date'] }}</td>
                            <td>{{ $entry }}</td>
                            <td>{{ $exit }}</td>
                            <td>{{ $workingHours }}</td>
                            <td>
                                <span class="badge bg-{{ $badgeClass }}">{{ $statusLabel }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p class="text-muted text-end mt-3">
                    Generated on {{ now()->format('Y-m-d H:i') }}
                </p>
            </div>
        </div>
    </div>
@endsection
