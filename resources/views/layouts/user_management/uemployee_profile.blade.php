@extends('layouts.master')

@section('title', 'Employee Profile')

@section('content')
    <div class="profile-container">
        <div class="profile-card">
            <div class="row profile-header align-items-center mb-4">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('storage/profile.jpg') }}" alt="Profile Photo" class="profile-avatar">
                </div>
                <div class="col-md-9">
                    <h3 class="mb-0">{{ $indivisualData->first_name }} {{ $indivisualData->last_name }}</h3>
                    <p class="text-muted mb-1">{{ $indivisualData->designation }} - {{ $indivisualData->department }} Department</p>
                    <span class="badge {{ $indivisualData->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                    {{ ucfirst($indivisualData->status) }}
                </span>
                </div>
            </div>

            <!-- Personal Info -->
            <div class="section-title">Personal Information</div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-envelope me-2"></i>Email:</span> {{ $indivisualData->email }}</p>
                    <p><span class="info-label"><i class="fas fa-phone me-2"></i>Phone:</span> {{ $indivisualData->phone }}</p>
                    <p><span class="info-label"><i class="fas fa-venus-mars me-2"></i>Gender:</span> {{ ucfirst($indivisualData->gender) }}</p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-calendar-alt me-2"></i>DOB:</span> {{ $indivisualData->date_of_birth->format('Y-m-d') }}</p>
                    <p><span class="info-label"><i class="fas fa-flag me-2"></i>Nationality:</span> {{ $indivisualData->nationality }}</p>
                    <p><span class="info-label"><i class="fas fa-ring me-2"></i>Marital Status:</span> {{ ucfirst($indivisualData->marital_status) }}</p>
                </div>
            </div>

            <!-- Address -->
            <div class="section-title">Address</div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-map-marker-alt me-2"></i>Present Address:</span><br>{{ $indivisualData->present_address }}</p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-home me-2"></i>Permanent Address:</span><br>{{ $indivisualData->permanent_address }}</p>
                </div>
            </div>

            <!-- Job Info -->
            <div class="section-title">Job Information</div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-briefcase me-2"></i>Designation:</span> {{ $indivisualData->designation }}</p>
                    <p><span class="info-label"><i class="fas fa-building me-2"></i>Department:</span> @if ($indivisualData->departments->isNotEmpty())
                                    {{ $indivisualData->departments->pluck('name')->join(', ') }}
                        @else
                            N/A
                        @endif
                    </p>
                    <p><span class="info-label"><i class="fas fa-calendar-plus me-2"></i>Joining Date:</span> {{ $indivisualData->joining_date->format('Y-m-d') }}</p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-id-badge me-2"></i>Employee ID:</span> {{ $indivisualData->employee_id }}</p>
                    <p><span class="info-label"><i class="fas fa-id-card me-2"></i>NID:</span> {{ $indivisualData->nid_name }}</p>
                    <p><span class="info-label"><i class="fas fa-barcode me-2"></i>RFID:</span> {{ $indivisualData->rf_id }}</p>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('hr.employee.list') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
            </div>
        </div>
    </div>
@endsection
