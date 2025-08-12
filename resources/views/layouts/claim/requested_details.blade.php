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

    <style>
        /* Mint Green Theme Colors */
        :root {
            --mint-green: #3eb489;
            --mint-green-light: #e6f7f3; /* lighter mint background */
            --mint-green-dark: #2a7f71;
            --text-muted-dark: #555;
        }

        .card-mint {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 20px rgb(62 180 137 / 0.15);
            background-color: var(--mint-green-light);
        }


        .card-mint .card-header {
            background-color: var(--mint-green);
            border-radius: 15px 15px 0 0;
            color: white;
            font-weight: 600;
            font-size: 1.3rem;
            letter-spacing: 0.04em;
            box-shadow: inset 0 -3px 6px rgb(0 0 0 / 0.1);
        }

        ul.list-group {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgb(62 180 137 / 0.2);
        }

        ul.list-group li.list-group-item {
            background-color: white;
            border: none;
            padding: 1.1rem 1.5rem;
            font-size: 1.05rem;
            color: var(--text-muted-dark);
            transition: background-color 0.3s ease;
        }

        ul.list-group li.list-group-item strong {
            color: var(--mint-green-dark);
            font-weight: 600;
        }

        ul.list-group li.list-group-item:not(:last-child) {
            border-bottom: 1px solid var(--mint-green-light);
        }

        ul.list-group li.list-group-item:hover {
            background-color: var(--mint-green-light);
            cursor: default;
        }

        /* Badge style */
        .badge-mint {
            background-color: var(--mint-green);
            color: white;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.4em 0.75em;
            border-radius: 20px;
            text-transform: capitalize;
            box-shadow: 0 2px 5px rgb(62 180 137 / 0.4);
        }

        /* Approval Flow Items */
        .approval-item {
            background: white;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 12px;
            box-shadow: 0 2px 12px rgb(62 180 137 / 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: box-shadow 0.3s ease;
        }
        .approval-item:hover {
            box-shadow: 0 4px 20px rgb(62 180 137 / 0.3);
        }
        .approval-details strong {
            color: var(--mint-green-dark);
            font-size: 1.05rem;
        }
        .approval-role {
            font-size: 0.85rem;
            color: #6b7c7c;
            margin-top: 3px;
            font-style: italic;
        }
        .approval-status {
            font-weight: 600;
            text-transform: capitalize;
            padding: 5px 14px;
            border-radius: 18px;
            min-width: 90px;
            text-align: center;
            color: white;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgb(62 180 137 / 0.25);
        }
        .status-approved {
            background-color: #28a745;
        }
        .status-pending {
            background-color: #ffc107;
            color: #333;
        }
        .status-rejected {
            background-color: #dc3545;
        }
        .approval-date {
            font-size: 0.8rem;
            color: #8f9b9b;
            margin-top: 5px;
            font-family: monospace;
        }

        /* Back Button */
        .btn-back {
            background-color: var(--mint-green);
            color: white;
            border-radius: 30px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgb(62 180 137 / 0.5);
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: var(--mint-green-dark);
            color: white;
        }
    </style>

    <div class="container py-5">
        <div class="card card-mint shadow-sm">
            <div class="card-header">
                <i class="bi bi-journal-text me-2"></i> Request Details
            </div>

            <div class="card-body">
                <h5 class="mb-4 text-muted fw-semibold">Request Summary</h5>
                <ul class="list-group mb-5">
                    <li class="list-group-item"><strong>Type:</strong> <span class="badge badge-mint">{{ ucfirst($request->type) }}</span></li>
                    <li class="list-group-item"><strong>Amount:</strong> Tk. {{ number_format($request->amount, 2) }}</li>
                    <li class="list-group-item"><strong>Purpose:</strong> {{ $request->purpose }}</li>
                    <li class="list-group-item"><strong>Submitted On:</strong> {{ $request->submitted_at->format('d M Y') }}</li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        @php
                            $statusColors = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger'];
                            $statusBg = $statusColors[$request->status] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $statusBg }} text-capitalize" style="font-weight:600; font-size:0.95rem;">
                        {{ $request->status }}
                    </span>
                    </li>
                </ul>

                <h5 class="mb-4 text-muted fw-semibold">Approval Flow</h5>
                <div>
                    @foreach ($request->approvals as $approval)
                        @php
                            $statusClass = [
                                'pending' => 'status-pending',
                                'approved' => 'status-approved',
                                'rejected' => 'status-rejected'
                            ][$approval->status] ?? 'status-pending';
                        @endphp
                        <div class="approval-item">
                            <div class="approval-details">
                                <strong>{{ $approval->approver_name }}</strong>
                                <div class="approval-role">Role: {{ $approval->approver_role }}</div>
                            </div>
                            <div class="text-end">
                                <span class="approval-status {{ $statusClass }}">{{ ucfirst($approval->status) }}</span>
                                @if ($approval->acted_at)
                                    <div class="approval-date">{{ $approval->acted_at->format('d M Y, h:i A') }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 text-center">
                    <a href="#" onclick="history.back()" class="btn btn-back">
                        <i class="bi bi-arrow-left-circle me-2"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
