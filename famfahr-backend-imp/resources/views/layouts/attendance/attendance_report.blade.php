@extends('layouts.master')

@section('title', 'Attendance Report')

@section('content')
    <style>
        :root {
            --mint-light: #f0fdfa;
            --mint: #3eb489;
            --mint-dark: #2a7f71;
            --gray-light: #f9f9f9;
        }

        body {
            background-color: var(--mint-light);
        }

        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 128, 96, 0.08);
        }

        .summary-box {
            background: white;
            border: 1px solid #e1e1e1;
            border-left: 5px solid var(--mint);
            border-radius: 10px;
            padding: 20px;
        }

        .summary-box h5 {
            font-weight: 600;
            color: var(--mint-dark);
        }

        .summary-box p {
            font-size: 1.25rem;
        }

        .filter-section {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }

        .table thead th {
            background-color: var(--mint);
            color: white;
        }

        .badge-status {
            font-size: 0.875rem;
            padding: 0.5em 0.75em;
            border-radius: 1rem;
        }
    </style>

    <div class="container py-5">
        <h2 class="text-center mb-4 text-success">📋 Employee Attendance Report</h2>

        {{-- Summary Boxes --}}
        <div class="row mb-4 text-center">
            <div class="col-md-4">
                <div class="summary-box shadow-sm">
                    <h5>✅ Present</h5>
                    <p class="text-success fw-bold">{{ $statusCounts['Present'] ?? 0 }} Days</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary-box shadow-sm">
                    <h5>⏰ Delayed</h5>
                    <p class="text-warning fw-bold">{{ $statusCounts['Delay'] ?? 0 }} Days</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="summary-box shadow-sm">
                    <h5>❌ Absent</h5>
                    <p class="text-danger fw-bold">{{ $statusCounts['Absent'] ?? 0 }} Days</p>
                </div>
            </div>
        </div>

        {{-- Filters --}}
        <div class="filter-section shadow-sm mb-4">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">All</option>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="Delay">Delay</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Apply Filters</button>
                </div>
            </form>
        </div>
        @php
            $data = [
                [
                    'date' => '2025-07-01',
                    'entry' => '09:10',
                    'exit' => '17:00',
                    'status' => 'Delay',
                ],
                [
                    'date' => '2025-07-02',
                    'entry' => '08:55',
                    'exit' => '17:05',
                    'status' => 'Present',
                ],
                [
                    'date' => '2025-07-03',
                    'entry' => '—',
                    'exit' => '—',
                    'status' => 'Absent',
                    'reason' => 'Uninformed',
                ],
                [
                    'date' => '2025-07-04',
                    'entry' => '—',
                    'exit' => '—',
                    'status' => 'Absent',
                    'reason' => 'Approved Leave',
                ],
                [
                    'date' => '2025-07-05',
                    'entry' => '08:58',
                    'exit' => '17:02',
                    'status' => 'Present',
                ],
                [
                    'date' => '2025-07-06',
                    'entry' => '09:20',
                    'exit' => '17:10',
                    'status' => 'Delay',
                ],
                [
                    'date' => '2025-07-07',
                    'entry' => '08:52',
                    'exit' => '17:00',
                    'status' => 'Present',
                ],
                [
                    'date' => '2025-07-08',
                    'entry' => '—',
                    'exit' => '—',
                    'status' => 'Absent',
                    'reason' => 'Medical Leave',
                ],
            ];
        @endphp

        {{-- Attendance Table --}}
        <div class="card card-custom">
            <div class="card-header bg-success text-white">
                <strong>Detailed Attendance Table</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead>
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
                    @forelse($data as $index => $item)
                        @php
                            $entry = $item['entry'];
                            $exit = $item['exit'];
                            $workingHours = '—';
                            if ($entry !== '—' && $exit !== '—') {
                                $start = \Carbon\Carbon::createFromFormat('H:i', $entry);
                                $end = \Carbon\Carbon::createFromFormat('H:i', $exit);
                                $workingHours = $start->diff($end)->format('%H:%I');
                            }

                            $status = $item['status'];
                            $reason = $item['reason'] ?? null;

                            $label = $status;
                            if ($status === 'Absent' && $reason) {
                                $label .= " ({$reason})";
                            }

                            $badgeClass = match($status) {
                                'Present' => 'success',
                                'Delay' => 'warning',
                                'Absent' => 'danger',
                                default => 'secondary',
                            };
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['date'] }}</td>
                            <td>{{ $entry }}</td>
                            <td>{{ $exit }}</td>
                            <td>{{ $workingHours }}</td>
                            <td><span class="badge bg-{{ $badgeClass }} badge-status">{{ $label }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">No attendance data available.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    <small class="text-muted">
                        <strong>Legend:</strong>
                        <span class="badge bg-success">Present</span>
                        <span class="badge bg-warning">Delay</span>
                        <span class="badge bg-danger">Absent</span>
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
