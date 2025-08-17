@extends('layouts.master')

@section('title', 'My Submissions')

@section('content')
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-collection me-2"></i>My Financial Submissions</h5>
            </div>

            <div class="card-body">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="submissionTabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="loan-tab" data-bs-toggle="tab" data-bs-target="#loan" type="button" role="tab">Loan Claims</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="claims-tab" data-bs-toggle="tab" data-bs-target="#claims" type="button" role="tab">Claims</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="advance-tab" data-bs-toggle="tab" data-bs-target="#advance" type="button" role="tab">Advance Salaries</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content mt-3">

                    <!-- Loan Claims -->
                    <div class="tab-pane fade show active" id="loan" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Method</th>
                                    <th>Duration</th>
                                    <th>Start</th>
                                    <th>Purpose</th>
                                    <th>Amount</th>
                                    <th>Submitted On</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($loanClaims as $i =>$loan)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td><span class="badge bg-secondary">{{ $loan->payment_method }}</span></td>
                                        <td>{{ $loan->duration_months }} {{ Str::plural('month', $loan->duration_months) }}</td>
                                        <td>{{ $loan->start_month }} {{ $loan->start_year }}</td>
                                        <td>{{ $loan->purpose }}</td>
                                        <td>{{ number_format($loan->amount, 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($loan->created_at)->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No loan claims found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Claims -->
                    <div class="tab-pane fade" id="claims" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Description</th>
                                    <th>Attachment</th>
                                    <th>Submitted On</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($claims as $i => $claim)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $claim->category }}</td>
                                        <td>{{ number_format($claim->amount, 2) }}</td>
                                        <td>{{ $claim->from_date }}</td>
                                        <td>{{ $claim->to_date }}</td>
                                        <td>{{ $claim->description }}</td>
                                        <td>
                                            @if ($claim->attachment)
                                                <a href="{{ asset('storage/' . $claim->attachment) }}" target="_blank">View</a>
                                            @else
                                                <span class="text-muted">None</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($claim->created_at)->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No claims found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Advance Salaries -->
                    <div class="tab-pane fade" id="advance" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-success text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Reason</th>
                                    <th>Submitted On</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($advanceSalaries as $i => $advance)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $advance->date }}</td>
                                        <td>{{ number_format($advance->salary, 2) }}</td>
                                        <td>{{ $advance->reason }}</td>
                                        <td>{{ \Carbon\Carbon::parse($advance->created_at)->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No advance salary requests found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <!-- end tab-content -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end container -->
@endsection
