@extends('layouts.master')

@section('title', 'Late Night Duty Request')

@section('content')
    <style>
        :root {
            --mint-green: #ADEBB3;
            --mint-green-dark: #79e879;
            --mint-green-light: #F0FFF0;
        }

        .bg-mint {
            background-color: var(--mint-green-light);
        }

        .text-mint {
            color: var(--mint-green-dark);
        }

        .btn-mint {
            background-color: var(--mint-green);
            border-color: var(--mint-green-dark);
            color: #000;
        }

        .btn-mint:hover {
            background-color: var(--mint-green-dark);
            color: #fff;
        }

        .card-custom {
            border: none;
            border-radius: 14px;
            overflow: hidden;
        }

        .form-floating label {
            font-weight: 500;
        }

        .form-check-label {
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-custom shadow-sm">
                    <div class="card-header bg-mint text-dark">
                        <h4 class="mb-0"><i class="bi bi-moon-stars-fill me-2"></i>Late Night Duty Request</h4>
                    </div>

                    <div class="card-body bg-light">

                         <form action="{{ route('roster.latenight.store') }}" method="POST">
                            @csrf

                            <!-- Duty Date -->
                            <div class="form-floating mb-3">
                                <input type="date" name="duty_date" id="duty_date" class="form-control" placeholder="Duty Date" required>
                                <label for="duty_date">Date of Duty</label>
                            </div>

                            <!-- From Time -->
                            <div class="form-floating mb-3">
                                <input type="time" name="from_time" id="from_time" class="form-control" placeholder="Start Time" required>
                                <label for="from_time">From Time</label>
                            </div>

                            <!-- To Time -->
                            <div class="form-floating mb-3">
                                <input type="time" name="to_time" id="to_time" class="form-control" placeholder="End Time" required>
                                <label for="to_time">To Time</label>
                            </div>

                            <!-- Reason -->
                            <div class="form-floating mb-4">
                                <textarea name="reason" id="reason" class="form-control" style="height: 100px;" placeholder="Reason for Late Duty"></textarea>
                                <label for="reason">Reason (Optional)</label>
                            </div>

                            <!-- Transport Required -->
                            <div class="form-check mb-4">
                                <!-- Always sends a value -->
                                <input type="hidden" name="transport_required" value="0">

                                <!-- Sends 1 only when checked -->
                                <input type="checkbox" name="transport_required" value="1" class="form-check-input" id="transport_required">
                                <label for="transport_required" class="form-check-label">
                                    Transport Required
                                </label>

                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-mint btn-lg shadow-sm">
                                    <i class="bi bi-send-check-fill me-2"></i>Submit Late Night Request
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
