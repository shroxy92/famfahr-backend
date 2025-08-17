<!-- resources/views/dashboard.blade.php -->
@extends('layouts.master')

@section('title', 'Loan Request')

@section('content')
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-8">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card shadow border-0">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0">New Advance Salary Request</h5>
                                </div>
                                <div class="card-body">
{{--                                    <form method="POST" action="{{ route('advance-salary.store') }}">--}}
                                    <form method="POST" action="{{route('loan.submit')}}">
                                    @csrf
                                    <div class = "row mb-3">
                                        {{-- Advance Amount --}}
                                        <div class="form-floating col-4">
                                            <input type="number" name="amount" min="0" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="0" value="{{ old('amount') }}" required>
                                            <label for="amount">Advance Amount*</label>
                                            @error('amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Payment Method --}}
                                        <div class="form-floating col-4">
                                            <select class="form-select @error('payment_method') is-invalid @enderror" name="payment_method" id="paymentMethod" required>
                                                <option value="" disabled selected>Select Method</option>
                                                <option value="Bank Transfer" {{ old('payment_method') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                                <option value="Cash" {{ old('payment_method') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                                <option value="Cheque" {{ old('payment_method') == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                                            </select>
                                            <label for="paymentMethod">Payment Method*</label>
                                            @error('payment_method')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- Payment Duration --}}
                                        <div class="form-floating col-4">
                                            <input type="number" name="duration_months" min="1" class="form-control @error('duration_months') is-invalid @enderror" id="duration" placeholder="0" value="{{ old('duration_months') }}" required>
                                            <label for="duration">Payment Duration (Months)*</label>
                                            @error('duration_months')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        {{-- Start Month --}}
                                        <div class="form-floating col-6">
                                            <select class="form-select @error('start_month') is-invalid @enderror" name="start_month" id="startMonth" required>
                                                <option value="" disabled selected>Select Month</option>
                                                @foreach(['January','February','March','April','May','June','July','August','September','October','November','December'] as $month)
                                                    <option value="{{ $month }}" {{ old('start_month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>
                                            <label for="startMonth">Start Month*</label>
                                            @error('start_month')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Start Year --}}
                                        <div class="form-floating col-6">
                                            <select class="form-select @error('start_year') is-invalid @enderror" name="start_year" id="startYear" required>
                                                <option value="" disabled selected>Select Year</option>
                                                @for($y = now()->year; $y <= now()->year + 5; $y++)
                                                    <option value="{{ $y }}" {{ old('start_year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                                @endfor
                                            </select>
                                            <label for="startYear">Year*</label>
                                            @error('start_year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        {{-- Purpose --}}
                                        <div class="form-floating mb-4">
                                            <textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror" id="purpose" style="height: 100px;" placeholder="Purpose for advance salary" required>{{ old('purpose') }}</textarea>
                                            <label for="purpose">Purpose*</label>
                                            @error('purpose')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Buttons --}}
                                        <div class="card-footer text-end">
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-send-fill me-1"></i> Submit Request
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
