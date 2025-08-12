@extends('layouts.master')

@section('title', 'Holiday Duty Request')

@section('content')
    <style>
        /* Custom Mint Green Theme */
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
            border-color: var(--mint-green-dark);
            color: #fff;
        }

        .card-custom {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }

        .form-floating label {
            font-weight: 500;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-custom shadow-sm">
                    <div class="card-header bg-mint text-dark">
                        <h4 class="mb-0"><i class="bi bi-calendar2-heart me-2"></i>Holiday Duty Request</h4>
                    </div>

                    <div class="card-body bg-light">

                         <form action="{{ route('roster.holiday.store') }}" method="POST">
{{--                        <form action="" method="POST">--}}
                            @csrf

                            <!-- Duty Date -->
                            <div class="form-floating mb-3">
                                <input type="date" name="duty_date" id="duty_date" class="form-control" placeholder="Date of Duty" required>
                                <label for="duty_date">Date of Duty</label>
                            </div>

                            <!-- Holiday Type -->
                            <div class="form-floating mb-3">
                                <select name="holiday_type" id="holiday_type" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="public">Public Holiday</option>
                                    <option value="weekend">Weekend</option>
                                    <option value="festival">Festival</option>
                                </select>
                                <label for="holiday_type">Type of Holiday</label>
                            </div>

                            <!-- Reason -->
                            <div class="form-floating mb-4">
                                <textarea name="reason" id="reason" class="form-control" placeholder="Optional Reason" style="height: 100px;"></textarea>
                                <label for="reason">Reason (Optional)</label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-mint btn-lg shadow-sm">
                                    <i class="bi bi-send-fill me-2"></i>Submit Request
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
