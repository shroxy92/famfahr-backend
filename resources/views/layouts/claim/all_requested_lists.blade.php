@extends('layouts.master')
@section('title', 'Claimed/Requested List')
@section('content')
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">My Financial Requests</h5>
            </div>

            <div class="card-body">
{{--                @if($requests->isEmpty())--}}
{{--                    <p class="text-center text-muted">No requests submitted yet.</p>--}}
{{--                @else--}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Category</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Submitted</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($requests as $index => $request)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $index + 1 }}</td>--}}
{{--                                    <td>--}}
{{--                                        <span class="badge bg-info text-dark">--}}
{{--                                            {{ ucfirst($request->type) }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
{{--                                    <td>${{ number_format($request->amount, 2) }}</td>--}}
{{--                                    <td>{{ Str::limit($request->purpose, 40) }}</td>--}}
{{--                                    <td>{{ $request->submitted_at->format('d M Y') }}</td>--}}
{{--                                    <td>--}}
{{--                                        @php--}}
{{--                                            $statusColors = [--}}
{{--                                                'pending' => 'warning',--}}
{{--                                                'approved' => 'success',--}}
{{--                                                'rejected' => 'danger',--}}
{{--                                            ];--}}
{{--                                        @endphp--}}
{{--                                        <span class="badge bg-{{ $statusColors[$request->status] ?? 'secondary' }}">--}}
{{--                                            {{ ucfirst($request->status) }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                                <tr onclick="window.location='{{ url('requested_details') }}';" style="cursor:pointer;">
                                        <td>1</td>
                                        <td><span class="badge bg-info text-dark">Advance Salary</span></td>
                                        <td></td>
                                        <td>1,2000.00</td>
                                        <td>Home rent advance for July</td>
                                        <td>01 Jul 2025</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><span class="badge bg-success">Loan</span></td>
                                    <td></td>
                                    <td>15,000.00</td>
                                    <td>Byke repair loan</td>
                                    <td>20 Jun 2025</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><span class="badge bg-secondary">Claim</span></td>
                                    <td></td>
                                    <td>250.00</td>
                                    <td>Medical reimbursement for June</td>
                                    <td>15 Jun 2025</td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><span class="badge bg-info text-dark">Advance Salary</span></td>
                                    <td></td>
                                    <td>8000.00</td>
                                    <td>Emergency family support</td>
                                    <td>10 Jun 2025</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><span class="badge bg-secondary">Claim</span></td>
                                    <td></td>
                                    <td>1500.00</td>
                                    <td>Travel reimbursement (conference)</td>
                                    <td>05 Jun 2025</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
{{--                @endif--}}
            </div>
        </div>
    </div>
@endsection
