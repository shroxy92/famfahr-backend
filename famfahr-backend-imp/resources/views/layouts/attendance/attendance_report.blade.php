@extends('layouts.master')

@section('title', 'Manual Attendance Form')

@section('content')
    <div class="container py-5 row">
        <h2 class="text-center mb-4">📋 Attendance Report</h2>
        <div class="col-1">

        </div>
        <div class="col-10">
{{--            --}}
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            Employee Attendance Summary
                        </div>
                                <!-- Summary Counts -->
                        @php
                            $data = [
                                ['date' => '2025-07-01', 'entry' => '09:10', 'exit' => '17:00', 'status' => 'Delay'],
                                ['date' => '2025-07-02', 'entry' => '08:55', 'exit' => '17:05', 'status' => 'Present'],
                                ['date' => '2025-07-03', 'entry' => '—', 'exit' => '—', 'status' => 'Absent', 'reason' => 'Uninformed'],
                                ['date' => '2025-07-04', 'entry' => '—', 'exit' => '—', 'status' => 'Absent', 'reason' => 'Approved Leave'],
                                ['date' => '2025-07-05', 'entry' => '08:58', 'exit' => '17:02', 'status' => 'Present'],
                            ];

                                    $statusCounts = collect($data)->groupBy('status')->map->count();
                                    $filtered = $data;
                        @endphp

                                    <!-- Filters -->
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        <form method="GET" class="row g-3 align-items-end">
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
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Summary -->
                                <div class="row text-center mb-4">
                                    <div class="col-md-4">
                                        <div class="p-3 shadow-sm rounded bg-light border">
                                            <h5 class="text-success">✅ Present</h5>
                                            <p class="fs-5">{{ $statusCounts['Present'] ?? 0 }} Days</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3 shadow-sm rounded bg-light border">
                                            <h5 class="text-warning">⏰ Delayed</h5>
                                            <p class="fs-5">{{ $statusCounts['Delay'] ?? 0 }} Days</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="p-3 shadow-sm rounded bg-light border">
                                            <h5 class="text-danger">❌ Absent</h5>
                                            <p class="fs-5">{{ $statusCounts['Absent'] ?? 0 }} Days</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Attendance Table -->
                                <div class="card shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <strong>Your Attendance Details</strong>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered align-middle table-striped text-center">
                                            <thead class="table-primary">
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
                                                @endphp
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item['date'] }}</td>
                                                    <td>{{ $entry }}</td>
                                                    <td>{{ $exit }}</td>
                                                    <td>{{ $workingHours }}</td>
                                                    <td>
                                                        @php
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

                                                        <span class="badge bg-{{ $badgeClass }}">
                                                            {{ $label }}
                                                        </span>
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-muted">No attendance records found.</td>
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
                </div>
        </div>
@endsection

