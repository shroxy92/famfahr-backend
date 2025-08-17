@extends('layouts.master')
@section('title', 'Apply for Leave')

@section('content')
    {{-- SweetAlert2 & jQuery CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f2fbf7;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
        }

        .card-header {
            background-color: #a8e6cf;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            font-weight: 600;
            color: #1e4c3b;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #cdeede;
        }

        .btn-success {
            background-color: #3cbf99;
            border: none;
        }

        .btn-success:hover {
            background-color: #2fa684;
        }

        .leave-icon {
            font-size: 1.2rem;
            color: #3cbf99;
            margin-right: 6px;
        }

        .is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            display: block;
        }
    </style>

    <div class="container py-5">
        <div class="row g-4">
            <!-- Form -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <i class="bi bi-clipboard-check leave-icon"></i> Leave Application
                    </div>
                    <div class="card-body px-4 py-4">
                        <form id="leaveForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Leave Type <span class="text-danger">*</span></label>
                                    <select name="leave_type" class="form-select" required>
                                        <option value="">-- Select Leave Type --</option>
                                        <option value="casual">Casual Leave</option>
                                        <option value="sick">Sick Leave</option>
                                        <option value="earned">Earned Leave</option>
                                    </select>
                                    <div class="invalid-feedback" id="leave_type_error"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" class="form-control" required>
                                    <div class="invalid-feedback" id="start_date_error"></div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" name="end_date" class="form-control" required>
                                    <div class="invalid-feedback" id="end_date_error"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Reason <span class="text-danger">*</span></label>
                                <textarea name="reason" class="form-control" rows="4" required></textarea>
                                <div class="invalid-feedback" id="reason_error"></div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4 py-2">
                                    <i class="bi bi-send-check-fill me-1"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Leave Balance -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-pie-chart-fill leave-icon"></i> Leave Balance
                    </div>
                    <div class="card-body">
                        @php
                            $leave_balance = [
                                'Casual Leave' => 5,
                                'Sick Leave' => 8,
                                'Earned Leave' => 12
                            ];
                        @endphp
                        <ul class="list-group list-group-flush">
                            @foreach($leave_balance as $type => $days)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $type }}
                                    <span class="badge bg-success rounded-pill">{{ $days }} Days</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AJAX Script --}}
    <script>
        $('#leaveForm').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let formData = form.serialize();

            // Reset errors
            $('.form-control, .form-select').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            $.ajax({
                type: 'POST',
                url: "",
                data: formData,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Leave Application Submitted!',
                        text: response.message || 'Your request has been submitted.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    form[0].reset();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        for (const field in errors) {
                            let input = $('[name="' + field + '"]');
                            input.addClass('is-invalid');
                            $('#' + field + '_error').text(errors[field][0]);
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            text: 'Please correct the highlighted fields.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Server Error',
                            text: 'Something went wrong. Please try again.',
                        });
                    }
                }
            });
        });
    </script>
@endsection
