@extends('layouts.master')

@section('title', 'Extra Duty Request')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Extra Duty Request</h4>
                    </div>

                    <div class="card-body">
{{--                        <form action="{{ route('extra-duty.store') }}" method="POST">--}}
                        <form action="" method="POST">
                            @csrf


                            <div class="form-floating mb-3">
                                <input type="date" name="extra_date" id="extra_date" class="form-control" placeholder="Extra Duty Date" required>
                                <label for="extra_date">Date of Extra Duty</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="time" name="start_time" id="start_time" class="form-control" placeholder="Start Time" required>
                                <label for="start_time">Start Time</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="time" name="end_time" id="end_time" class="form-control" placeholder="End Time" required>
                                <label for="end_time">End Time</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="task_description" id="task_description" class="form-control" style="height: 100px;" placeholder="Task Description"></textarea>
                                <label for="task_description">Task Description</label>
                            </div>

                            <div class="form-check mb-4">
                                <input type="checkbox" name="approved_by_lead" class="form-check-input" id="approved_by_lead">
                                <label for="approved_by_lead" class="form-check-label">Approved by Team Lead</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-plus-circle me-2"></i>Submit Extra Duty Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

