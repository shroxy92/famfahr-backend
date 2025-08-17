@extends('layouts.master')

@section('title', 'Processed Duty Requests')

@section('content')
    <style>
        :root {
            --mint-green: #ADEBB3;
            --mint-green-dark: #79e879;
            --mint-green-light: #F0FFF0;
            --text-dark: #2f2f2f;
        }
        .badge-approved { background-color: var(--mint-green); color: var(--text-dark); }
        .badge-rejected { background-color: #f28b82; color: white; }
        .filter-panel { background-color: var(--mint-green-light); padding: 1rem; border-radius: 8px; }
        .card-header-custom { background-color: var(--mint-green); color: var(--text-dark); }
    </style>

    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Processed Requests</h5>

                <form method="GET" class="filter-panel d-flex gap-2 align-items-center">
                    <label for="status" class="mb-0">Status:</label>
                    <select name="status" id="status" class="form-select form-select-sm w-auto">
                        <option value="">All</option>
                        <option value="approved"{{ request('status') == 'approved' ? ' selected' : '' }}>Approved</option>
                        <option value="rejected"{{ request('status') == 'rejected' ? ' selected' : '' }}>Rejected</option>
                    </select>
                    <button type="submit" class="btn btn-success btn-sm">Filter</button>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Processed On</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($processedRequests as $i => $req)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><span class="badge
                                    @if ($req->type === 'extra') bg-success
                                    @elseif ($req->type === 'holiday') bg-warning text-dark
                                    @elseif ($req->type === 'latenight') bg-info text-dark
                                    @endif
                                    text-capitalize">
                                    {{ $req->type }}
                                </span></td>
                                <td>{{ \Carbon\Carbon::parse($req->date)->format('d M Y') }}</td>
                                <td>
                                    <small>
                                        @switch($req->type)
                                            @case('extra')
                                                <strong>Time:</strong> {{ $req->time_range }}<br>
                                                <strong>Task:</strong> {{ $req->details }}
                                                @break

                                            @case('holiday')
                                                <strong>Reason:</strong> {{ $req->details }}
                                                @break

                                            @case('latenight')
                                                <strong>Time:</strong> {{ $req->time_range }}<br>
                                                <strong>Reason:</strong> {{ $req->details }}
                                                @break
                                        @endswitch
                                    </small>
                                </td>
                                <td>
                                    @if ($req->status === 'approved')
                                        <span class="badge badge-approved">Approved</span>
                                    @else
                                        <span class="badge badge-rejected">Rejected</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($req->processed_at)->format('d M Y, h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    No processed requests found.
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
