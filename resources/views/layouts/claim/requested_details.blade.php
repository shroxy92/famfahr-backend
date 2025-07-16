@extends('layouts.master')
@section('title', 'Sample Request Detail')

@section('content')
    @php
        // Fake request object
        $request = (object)[
            'type' => 'advance salary',
            'amount' => 12000.00,
            'purpose' => 'Home rent advance for July',
            'submitted_at' => \Carbon\Carbon::create(2025, 7, 1),
            'status' => 'pending',
            'approvals' => collect([
                (object)[
                    'approver_name' => 'Motiur Rahaman Chowdhury',
                    'approver_role' => 'Department Head',
                    'status' => 'approved',
                    'acted_at' => \Carbon\Carbon::create(2025, 7, 2, 10, 30)
                ],
                (object)[
                    'approver_name' => 'Md. Arsahadul alam',
                    'approver_role' => 'HR-Admin',
                    'status' => 'pending',
                    'acted_at' => null
                ],
                (object)[
                    'approver_name' => 'Md. A.H.M Kamal',
                    'approver_role' => 'Management',
                    'status' => 'pending',
                    'acted_at' => null
                ],
            ])
        ];
    @endphp

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Request Details</h5>
            </div>

            <div class="card-body">
                <h5 class="mb-3 text-secondary">Request Summary</h5>
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>Type:</strong>
                        <span class="badge bg-info text-dark">{{ ucfirst($request->type) }}</span>
                    </li>
                    <li class="list-group-item"><strong>Amount:</strong> Tk.{{ number_format($request->amount, 2) }}</li>
                    <li class="list-group-item"><strong>Purpose:</strong> {{ $request->purpose }}</li>
                    <li class="list-group-item"><strong>Submitted On:</strong> {{ $request->submitted_at->format('d M Y') }}</li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span class="badge bg-{{ ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger'][$request->status] ?? 'secondary' }}">
                        {{ ucfirst($request->status) }}
                    </span>
                    </li>
                </ul>

                <h5 class="mb-3 text-secondary">Approval Flow</h5>
                <div class="list-group">
                    @foreach ($request->approvals as $approval)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $approval->approver_name }}</strong><br>
                                <small class="text-muted">Role: {{ $approval->approver_role }}</small>
                            </div>
                            <div class="text-end">
                            <span class="badge bg-{{ [
                                'pending' => 'warning',
                                'approved' => 'success',
                                'rejected' => 'danger'
                            ][$approval->status] }}">
                                {{ ucfirst($approval->status) }}
                            </span>
                                @if($approval->acted_at)
                                    <div class="text-muted small mt-1">{{ $approval->acted_at->format('d M Y, h:i A') }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    <a href="#" onclick="history.back()" class="btn btn-secondary">← Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection





{{--@extends('layouts.master')--}}
{{--@section('title', 'Request Details')--}}

{{--@section('content')--}}
{{--    <div class="container py-5">--}}
{{--        <div class="card shadow-sm">--}}
{{--            <div class="card-header bg-primary text-white">--}}
{{--                <h5 class="mb-0">Request Details</h5>--}}
{{--            </div>--}}

{{--            <div class="card-body">--}}
{{--                <h5 class="mb-3 text-secondary">Request Summary</h5>--}}
{{--                <ul class="list-group mb-4">--}}
{{--                    <li class="list-group-item"><strong>Type:</strong> <span class="badge bg-info text-dark">{{ ucfirst($request->type) }}</span></li>--}}
{{--                    <li class="list-group-item"><strong>Amount:</strong> ${{ number_format($request->amount, 2) }}</li>--}}
{{--                    <li class="list-group-item"><strong>Purpose:</strong> {{ $request->purpose }}</li>--}}
{{--                    <li class="list-group-item"><strong>Submitted On:</strong> {{ $request->submitted_at->format('d M Y') }}</li>--}}
{{--                    <li class="list-group-item">--}}
{{--                        <strong>Status:</strong>--}}
{{--                        <span class="badge bg-{{ ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger'][$request->status] ?? 'secondary' }}">--}}
{{--                        {{ ucfirst($request->status) }}--}}
{{--                    </span>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--                <h5 class="mb-3 text-secondary">Approval Flow</h5>--}}
{{--                <div class="list-group">--}}
{{--                    @foreach ($request->approvals as $approval)--}}
{{--                        <div class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                            <div>--}}
{{--                                <strong>{{ $approval->approver_name }}</strong><br>--}}
{{--                                <small class="text-muted">Role: {{ $approval->approver_role }}</small>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                            <span class="badge bg-{{ [--}}
{{--                                'pending' => 'warning',--}}
{{--                                'approved' => 'success',--}}
{{--                                'rejected' => 'danger'--}}
{{--                            ][$approval->status] }}">--}}
{{--                                {{ ucfirst($approval->status) }}--}}
{{--                            </span>--}}
{{--                                @if($approval->acted_at)--}}
{{--                                    <div class="text-muted small mt-1">{{ $approval->acted_at->format('d M Y, h:i A') }}</div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--                <div class="mt-4">--}}
{{--                    <a href="{{ route('requests.index') }}" class="btn btn-secondary">← Back to List</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

