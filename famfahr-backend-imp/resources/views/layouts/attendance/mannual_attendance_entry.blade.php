@extends('layouts.master')

@section('title', 'Manual Attendance Form')

@section('content')
    <style>
        :root {
            --mint-green: #3eb489;
            --mint-green-dark: #2a7f71;
            --mint-light: #f0fdfa; /* Updated to even lighter mint */
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

        .btn-mint {
            background-color: var(--mint-green);
            border-color: var(--mint-green);
            color: #fff;
        }

        .btn-mint:hover {
            background-color: var(--mint-green-dark);
            border-color: var(--mint-green-dark);
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-4 text-center text-success fw-semibold">Manual Attendance Entry</h2>

                <div class="card card-mint">
                    <div class="card-header bg-mint">
                        Add Attendance
                    </div>

                    <div class="card-body">
                         <form action="{{ route('attendance.entry.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Entry Time -->
                                <div class="col-md-3">
                                    <label for="entry_time" class="form-label">Entry Time</label>
                                    <input
                                        type="time"
                                        name="entry_time"
                                        class="form-control"
                                        @if(isset($attendance) && $attendance->entry_time)
                                            value="{{ $attendance->entry_time }}"
                                        disabled
                                        @endif
                                    >
                                </div>

                                <!-- Exit Time -->
                                <div class="col-md-3">
                                    <label for="exit_time" class="form-label">Exit Time</label>
                                    <input
                                        type="time"
                                        name="exit_time"
                                        class="form-control"
                                        @if(isset($attendance) && $attendance->exit_time)
                                            value="{{ $attendance->exit_time }}"
                                        @endif
                                    >
                                </div>

                                <!-- Date (pre-filled with today's date) -->
                                <div class="col-md-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input
                                        type="date"
                                        name="date"
                                        class="form-control"
                                        value="{{ isset($attendance) ? $attendance->date : now()->toDateString() }}"
                                        readonly
                                    >
                                </div>

                                <!-- Reason -->
                                <div class="col-md-3">
                                    <label for="reason" class="form-label">Reason</label>
                                    <input
                                        type="text"
                                        name="reason"
                                        class="form-control"
                                        @if(isset($attendance) && $attendance->reason)
                                            value="{{ $attendance->reason }}"
                                        @endif
                                        @if(isset($attendance) && $attendance->entry_time)
                                            disabled
                                        @endif
                                    >
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-mint float-end">
                                        <i class="bi bi-check-circle me-1"></i> Submit Attendance
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
