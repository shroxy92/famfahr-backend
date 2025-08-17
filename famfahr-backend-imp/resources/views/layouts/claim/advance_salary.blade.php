<!-- resources/views/dashboard.blade.php -->
@extends('layouts.master')

@section('title', 'Advance Salary')

@section('content')
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card shadow-lg border-0">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="mb-0">Advance Salary Request</h4>
                                </div>
                                <div class="card-body">
{{--                                    <form action="{{ //route('advance-salary.store') }}" method="POST">--}}
                                    <form action="{{route('advance.salary.submit')}}" method="POST">
                                    @csrf
                                        <div class="form-floating mb-3">
                                            <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="5000" value="{{ old('amount') }}" required>
                                            <label for="amount">Requested Amount</label>
                                            @error('amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="date" name="needed_by" class="form-control @error('needed_by') is-invalid @enderror" id="neededBy" value="{{ old('needed_by') }}" required>
                                            <label for="neededBy">Date Needed By</label>
                                            @error('needed_by')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason" style="height: 100px;" placeholder="Reason for advance salary" required>{{ old('reason') }}</textarea>
                                            <label for="reason">Reason</label>
                                            @error('reason')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Submit Request
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-2">

        </div>
    </div>
@endsection
