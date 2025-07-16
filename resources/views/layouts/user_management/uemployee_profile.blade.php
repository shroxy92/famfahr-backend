@extends('layouts.master')

@section('title', 'Application Details')

@section('content')
    <div class="profile-container">
        <div class="profile-card">
            <div class="row profile-header align-items-center mb-4">
                <div class="col-md-3 text-center">
                    <img src="../../../../storage/profile.jpg" alt="Profile Photo" class="profile-avatar">
                </div>
                <div class="col-md-9">
                    <h3 class="mb-0">John Doe</h3>
                    <p class="text-muted mb-1">Developer - IT Department</p>
                    <span class="badge bg-success">Active</span>
                </div>
            </div>

            <!-- Personal Info -->
            <div class="section-title">Personal Information</div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-envelope me-2"></i>Email:</span> <span class="info-value">john@example.com</span></p>
                    <p><span class="info-label"><i class="fas fa-phone me-2"></i>Phone:</span> <span class="info-value">+1234567890</span></p>
                    <p><span class="info-label"><i class="fas fa-venus-mars me-2"></i>Gender:</span> <span class="info-value">Male</span></p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-calendar-alt me-2"></i>DOB:</span> <span class="info-value">1990-01-15</span></p>
                    <p><span class="info-label"><i class="fas fa-flag me-2"></i>Nationality:</span> <span class="info-value">Nigerian</span></p>
                    <p><span class="info-label"><i class="fas fa-ring me-2"></i>Marital Status:</span> <span class="info-value">Married</span></p>
                </div>
            </div>

            <!-- Address -->
            <div class="section-title">Address</div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-map-marker-alt me-2"></i>Present Address:</span><br>123 Street, Lagos, Nigeria</p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-home me-2"></i>Permanent Address:</span><br>456 Avenue, Abuja, Nigeria</p>
                </div>
            </div>

            <!-- Job Info -->
            <div class="section-title">Job Information</div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-briefcase me-2"></i>Designation:</span> Developer</p>
                    <p><span class="info-label"><i class="fas fa-building me-2"></i>Department:</span> IT</p>
                    <p><span class="info-label"><i class="fas fa-calendar-plus me-2"></i>Joining Date:</span> 2020-08-01</p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label"><i class="fas fa-id-badge me-2"></i>Employee ID:</span> EMP001</p>
                    <p><span class="info-label"><i class="fas fa-id-card me-2"></i>NID:</span> NID456789</p>
                    <p><span class="info-label"><i class="fas fa-barcode me-2"></i>RFID:</span> RF123456</p>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-1"></i> Back to List
                </a>
            </div>
        </div>
    </div>



@endsection
