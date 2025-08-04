@extends('layouts.master')
@section('title', 'Apply for Leave')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="container py-5">

                <h2 class="mb-4">Leave Report</h2>

                {{-- Sample Summary --}}
                <div class="row g-4 mb-5">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Applied</h5>
                                <p class="card-text fs-4">4</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Approved</h5>
                                <p class="card-text fs-4">3</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Adjusted</h5>
                                <p class="card-text fs-4">2</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">Rejected</h5>
                                <p class="card-text fs-4">1</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tabs --}}
                <ul class="nav nav-tabs mb-4" id="leaveTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="applied-tab" data-bs-toggle="tab" data-bs-target="#applied" type="button">Applied</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="approved-tab" data-bs-toggle="tab" data-bs-target="#approved" type="button">Approved</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="adjusted-tab" data-bs-toggle="tab" data-bs-target="#adjusted" type="button">Adjusted</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button">Rejected</button>
                    </li>
                </ul>

                <div class="tab-content" id="leaveTabContent">

                    {{-- Applied --}}
                    <div class="tab-pane fade show active" id="applied" role="tabpanel">
                        @include('layouts.leave.leave_sample_table', ['type' => 'Applied'])
                    </div>

                    {{-- Approved --}}
                    <div class="tab-pane fade" id="approved" role="tabpanel">
                        @include('layouts.leave.leave_sample_table', ['type' => 'Approved'])
                    </div>

                    {{-- Adjusted --}}
                    <div class="tab-pane fade" id="adjusted" role="tabpanel">
                        @include('layouts.leave.leave_sample_table', ['type' => 'Adjusted'])
                    </div>

                    {{-- Rejected --}}
                    <div class="tab-pane fade" id="rejected" role="tabpanel">
                        @include('layouts.leave.leave_sample_table', ['type' => 'Rejected'])
                    </div>

                </div>

            </div>
        </div>
        <div class="col-1"></div>
    </div>
@endsection
