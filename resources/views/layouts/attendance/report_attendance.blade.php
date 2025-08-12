@extends('layouts.master')

@section('title', 'Attendance Report')

@section('content')
    <style>
        :root {
            --mint-green: #3eb489;
            --mint-green-dark: #2a7f71;
            --mint-light: #f0fdfa;
        }

        body {
            background-color: var(--mint-light);
        }

        .card-mint {
            background-color: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(62, 180, 137, 0.12);
        }

        .card-header.bg-mint {
            background-color: var(--mint-green);
            color: white;
            font-weight: 600;
        }

        .badge-status {
            font-size: 0.9rem;
            padding: 0.45em 0.75em;
        }

        table th, table td {
            vertical-align: middle !important;
        }
    </style>

    <div class="container py-5">
        <h2 class="text-center mb-4 text-success fw-semibold">
            🧾 My Attendance Report
        </h2>

{{--        @php--}}
{{--            $attendanceData = [--}}
{{--                ['date' => '2025-07-01', 'entry' => '09:02:17', 'exit' => '17:00:35', 'status' => 'Present', 'leave_type' => null],--}}
{{--                ['date' => '2025-07-02', 'entry' => '09:30:53', 'exit' => '17:15:02', 'status' => 'Delay', 'leave_type' => null],--}}
{{--                ['date' => '2025-07-03', 'entry' => '—', 'exit' => '—', 'status' => 'Absent', 'leave_type' => 'Sick'],--}}
{{--                ['date' => '2025-07-04', 'entry' => '—', 'exit' => '—', 'status' => 'Absent', 'leave_type' => 'Casual'],--}}
{{--                ['date' => '2025-07-05', 'entry' => '—', 'exit' => '—', 'status' => 'Absent', 'leave_type' => null],--}}
{{--            ];--}}
{{--        @endphp--}}

        <div class="card card-mint">
            <div class="card-header bg-mint">
                <i class="bi bi-calendar-check-fill me-2"></i> Attendance Details
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover text-center align-middle">
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
                            $entry = $item['entry_time'] ?? null;
                            $exit = $item['exit_time'] ?? null;
                            $reason = $item['reason'] ?? null;
                            $workingHours = '—';
                            $cleanEntry = trim($entry);
                            $cleanExit = trim($exit);

                            $isValidEntry = preg_match('/^\d{2}:\d{2}:\d{2}$/', $cleanEntry);
                            $isValidExit = preg_match('/^\d{2}:\d{2}:\d{2}$/', $cleanExit);
                            if ($isValidEntry && $isValidExit) {
                                $start = \Carbon\Carbon::createFromFormat('H:i:s', $cleanEntry);
                                $end = \Carbon\Carbon::createFromFormat('H:i:s', $cleanExit);
                                $workingHours = $start->diff($end)->format('%H:%I');
                            }

                            // Determine status
                            $badgeClass = 'secondary';
                            $statusCode = '—';
                            $tooltip = '';
                            $icon = 'bi-question-circle';

                            if (!$cleanEntry && $reason) {
                                // Leave scenario
                                $badgeClass = 'info';
                                $statusCode = 'L';
                                $tooltip = 'Leave';
                                $icon = 'bi-person-dash';
                            } elseif (!$cleanEntry && !$reason) {
                                // Uninformed absence
                                $badgeClass = 'danger';
                                $statusCode = 'A';
                                $tooltip = 'Uninformed Absence';
                                $icon = 'bi-x-circle';
                            } elseif ($isValidEntry) {
                                $entryTime = \Carbon\Carbon::createFromFormat('H:i:s', $cleanEntry);
                                $lateTime = \Carbon\Carbon::createFromTime(9,15,59); // 9:15 AM cutoff

                                if ($entryTime->gt($lateTime)) {
                                    $badgeClass = 'warning';
                                    $statusCode = 'D';
                                    $tooltip = 'Late Entry';
                                    $icon = 'bi-clock-history';
                                } else {
                                    $badgeClass = 'success';
                                    $statusCode = 'P';
                                    $tooltip = 'Present';
                                    $icon = 'bi-check-circle';
                                }
                            }
                        @endphp

                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['date'] }}</td>
                            <td>{{ $entry ?? '—' }}</td>
                            <td>{{ $exit ?? '—' }}</td>
                            <td>{{ $workingHours }}</td>
                            <td>
            <span class="badge bg-{{ $badgeClass }} badge-status" data-bs-toggle="tooltip" title="{{ $tooltip }}">
                <i class="bi {{ $icon }} me-1"></i> {{ $statusCode }}
            </span>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <p class="text-muted text-end mt-3">
                    <i class="bi bi-clock me-1"></i>Generated on {{ now()->format('Y-m-d H:i') }}
                </p>
            </div>
        </div>
    </div>
@endsection
