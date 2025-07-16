@extends('layouts.master')

@section('title', 'Late Night Duty Request')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Late Night Duty Request</h4>
                    </div>

                    <div class="card-body">
{{--                        <form action="{{ route('latenight-duty.store') }}" method="POST">--}}
                        <form action="" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="date" name="duty_date" id="duty_date" class="form-control" placeholder="Duty Date" required>
                                <label for="duty_date">Date of Duty</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="time" name="from_time" id="from_time" class="form-control" placeholder="Start Time" required>
                                <label for="from_time">From Time</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="time" name="to_time" id="to_time" class="form-control" placeholder="End Time" required>
                                <label for="to_time">To Time</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="reason" id="reason" class="form-control" style="height: 100px;" placeholder="Reason for Late Duty"></textarea>
                                <label for="reason">Reason (Optional)</label>
                            </div>

                            <div class="form-check mb-4">
                                <input type="checkbox" name="transport_required" class="form-check-input" id="transport_required">
                                <label for="transport_required" class="form-check-label">Transport Required</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-moon-fill me-2"></i>Submit Late Night Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
