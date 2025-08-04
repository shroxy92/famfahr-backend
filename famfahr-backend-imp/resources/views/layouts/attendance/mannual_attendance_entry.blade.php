@extends('layouts.master')

@section('title', 'Manual Attendance Form')

@section('content')
    <div class="container py-5 row">
        <h2 class="mb-4 text-center">Manual Attendance Entry</h2>
        <div class="col-1">

        </div>
        <div class="col-10">
                    <!-- Attendance Entry Form -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white">
                            Add Attendance
                        </div>
                        <div class="card-body">
{{--                            <form action="{{ route('attendance.store') }}" method="POST">--}}
{{--                                @csrf--}}
                            <form action="#" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="entry_time" class="form-label">Entry Time</label>
                                        <input type="time" name="entry_time" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exit_time" class="form-label">Exit Time</label>
                                        <input type="time" name="exit_time" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button type="submit" class="btn btn-success w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

@endsection
