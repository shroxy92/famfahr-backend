@extends('layouts.master')

@section('title', 'Holiday Duty Request')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Holiday Duty Request</h4>
                    </div>

                    <div class="card-body">
                        {{-- <form action="{{ route('holiday-duty.store') }}" method="POST"> --}}
                        <form action="" method="POST">
                            @csrf

                            {{-- Floating Input --}}


                            <div class="form-floating mb-3">
                                <input type="date" name="duty_date" id="duty_date" class="form-control" placeholder="Date of Duty" required>
                                <label for="duty_date">Date of Duty</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="holiday_type" id="holiday_type" class="form-select" required>
                                    <option value="" selected disabled>Select</option>
                                    <option value="public">Public Holiday</option>
                                    <option value="weekend">Weekend</option>
                                    <option value="festival">Festival</option>
                                </select>
                                <label for="holiday_type">Type of Holiday</label>
                            </div>

                            <div class="form-floating mb-4">
                                <textarea name="reason" id="reason" class="form-control" placeholder="Optional Reason" style="height: 100px;"></textarea>
                                <label for="reason">Reason (Optional)</label>
                            </div>

{{--                            <div class="form-check mb-4">--}}
{{--                                <input class="form-check-input" type="checkbox" name="approved" id="approved">--}}
{{--                                <label class="form-check-label" for="approved">--}}
{{--                                    Approved by Supervisor--}}
{{--                                </label>--}}
{{--                            </div>--}}

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
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
