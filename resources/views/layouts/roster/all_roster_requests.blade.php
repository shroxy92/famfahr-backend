@extends('layouts.master')

@section('title', 'Applied Duty Applications')

@section('content')
    <div class="container py-5 row">
        <h2 class="mb-4 text-center">My Duty Applications</h2>
        <div class="col-1">

        </div>
        <div class="col-10">
        {{-- Holiday Duty Applications --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Holiday Duty Applications</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>04 Jul 2025</td>
                        <td>Public</td>
                        <td>Server maintenance</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr onclick="window.location='{{ url('request_details') }}';" style="cursor:pointer;">
                        <td>2</td>
                        <td>01 May 2025</td>
                        <td>Festival</td>
                        <td>Client support needed</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Late Night Duty Applications --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="bi bi-moon-stars-fill me-2"></i>Late Night Duty Applications</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>05 Jul 2025</td>
                        <td>21:00</td>
                        <td>23:30</td>
                        <td>Production release</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>29 Jun 2025</td>
                        <td>22:00</td>
                        <td>23:00</td>
                        <td>Emergency patch</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Extra Duty Applications --}}
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i>Extra Duty Applications</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Task</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>02 Jul 2025</td>
                        <td>10:00</td>
                        <td>14:00</td>
                        <td>Client report preparation</td>
                        <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>30 Jun 2025</td>
                        <td>15:00</td>
                        <td>18:00</td>
                        <td>Data migration</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection


{{--    @extends('layouts.master')--}}

{{--    @section('title', 'Applied Duty Applications')--}}

{{--    @section('content')--}}
{{--        <div class="container py-5">--}}
{{--            <h2 class="mb-4 text-center">My Duty Applications</h2>--}}

{{--            <div class="card shadow-sm mb-5">--}}
{{--                <div class="card-header bg-primary text-white">--}}
{{--                    <h5 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Holiday Duty Applications</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body p-0">--}}
{{--                    <table class="table table-hover mb-0">--}}
{{--                        <thead class="table-light">--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Date</th>--}}
{{--                            <th>Type</th>--}}
{{--                            <th>Reason</th>--}}
{{--                            <th>Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse ($holidayDuties as $duty)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $loop->iteration }}</td>--}}
{{--                                <td>{{ \Carbon\Carbon::parse($duty->duty_date)->format('d M Y') }}</td>--}}
{{--                                <td class="text-capitalize">{{ $duty->holiday_type }}</td>--}}
{{--                                <td>{{ $duty->reason ?? '—' }}</td>--}}
{{--                                <td>--}}
{{--                                <span class="badge bg-{{ getStatusClass($duty->status) }}">--}}
{{--                                    {{ ucfirst($duty->status) }}--}}
{{--                                </span>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr><td colspan="5" class="text-center text-muted">No applications found.</td></tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Late Night Duty Section -->--}}
{{--            <div class="card shadow-sm mb-5">--}}
{{--                <div class="card-header bg-dark text-white">--}}
{{--                    <h5 class="mb-0"><i class="bi bi-moon-stars-fill me-2"></i>Late Night Duty Applications</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body p-0">--}}
{{--                    <table class="table table-hover mb-0">--}}
{{--                        <thead class="table-light">--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Date</th>--}}
{{--                            <th>From</th>--}}
{{--                            <th>To</th>--}}
{{--                            <th>Reason</th>--}}
{{--                            <th>Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse ($lateNightDuties as $duty)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $loop->iteration }}</td>--}}
{{--                                <td>{{ \Carbon\Carbon::parse($duty->duty_date)->format('d M Y') }}</td>--}}
{{--                                <td>{{ $duty->from_time }}</td>--}}
{{--                                <td>{{ $duty->to_time }}</td>--}}
{{--                                <td>{{ $duty->reason ?? '—' }}</td>--}}
{{--                                <td>--}}
{{--                                <span class="badge bg-{{ getStatusClass($duty->status) }}">--}}
{{--                                    {{ ucfirst($duty->status) }}--}}
{{--                                </span>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr><td colspan="6" class="text-center text-muted">No applications found.</td></tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Extra Duty Section -->--}}
{{--            <div class="card shadow-sm">--}}
{{--                <div class="card-header bg-success text-white">--}}
{{--                    <h5 class="mb-0"><i class="bi bi-plus-circle-fill me-2"></i>Extra Duty Applications</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body p-0">--}}
{{--                    <table class="table table-hover mb-0">--}}
{{--                        <thead class="table-light">--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Date</th>--}}
{{--                            <th>From</th>--}}
{{--                            <th>To</th>--}}
{{--                            <th>Task</th>--}}
{{--                            <th>Status</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse ($extraDuties as $duty)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $loop->iteration }}</td>--}}
{{--                                <td>{{ \Carbon\Carbon::parse($duty->extra_date)->format('d M Y') }}</td>--}}
{{--                                <td>{{ $duty->start_time }}</td>--}}
{{--                                <td>{{ $duty->end_time }}</td>--}}
{{--                                <td>{{ $duty->task_description ?? '—' }}</td>--}}
{{--                                <td>--}}
{{--                                <span class="badge bg-{{ getStatusClass($duty->status) }}">--}}
{{--                                    {{ ucfirst($duty->status) }}--}}
{{--                                </span>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr><td colspan="6" class="text-center text-muted">No applications found.</td></tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endsection--}}
