@extends('layouts.master')

@section('title', 'Processed Loan Requests')

@section('content')
    <div class="row">
        <div class="col-1"></div>

        <div class="col-10">
            <div class="container py-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-cash-coin me-2"></i>Processed Loan Requests</h5>

                        {{-- Filter (optional, e.g., by payment method) --}}
                        <form method="GET" class="d-flex gap-2">
                            <select name="payment_method" class="form-select form-select-sm w-auto">
                                <option value="">All Methods</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Cash">Cash</option>
                            </select>
                            <button class="btn btn-light btn-sm" type="submit">Filter</button>
                        </form>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-success text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Method</th>
                                    <th>Duration</th>
                                    <th>Start Period</th>
                                    <th>Purpose</th>
                                    <th>Amount</th>
                                    <th>Requested On</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($dataList as $i => $loan)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $loan['payment_method'] }}</span>
                                        </td>
                                        <td>{{ $loan['duration_months'] }} {{ Str::plural('month', $loan['duration_months']) }}</td>
                                        <td>{{ $loan['start_month'] }} {{ $loan['start_year'] }}</td>
                                        <td>{{ $loan['purpose'] }}</td>
                                        <td>{{ number_format($loan['amount'], 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($loan['created_at'])->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            No loan requests found.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-1"></div>
    </div>
@endsection
