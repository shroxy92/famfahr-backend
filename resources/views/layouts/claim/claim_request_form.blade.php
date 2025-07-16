<!-- resources/views/dashboard.blade.php -->
@extends('layouts.master')

@section('title', 'Claim Request')

@section('content')
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Submit a Claim</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <!-- Claim Category -->
                                <div class="col-8">
                                    <label for="category" class="form-label">Claim Category</label>
                                    <select name="category" id="category" class="form-select" required>
                                        <option value="">Select a category</option>
                                        <option value="Travel">Festival Holiday</option>
                                        <option value="Medical">Daily Conveyance Reimbursement</option>
                                        <option value="Food">Holiday Allowance</option>
                                        <option value="Other">Other</option>
                                        <option value="Travel">Night Allowance</option>
                                        <option value="Medical">Travel Allowance</option>
                                    </select>
                                </div>
                                <!-- Claim Amount -->
                                <div class="col-4">
                                    <label for="amount" class="form-label">Claim Amount</label>
                                    <input type="number" step="0.01" name="amount" id="amount" class="form-control" placeholder="Enter claim amount" required>
                                </div>

                            </div>
                            <!-- Claim Date -->
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="date" class="form-label">From Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="col-6">
                                    <label for="date" class="form-label">To Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Add a description..." required></textarea>
                            </div>

                            <!-- Attach File -->
                            <div class="mb-3">
                                <label for="attachment" class="form-label">Attach File</label>
                                <input type="file" name="attachment" id="attachment" class="form-control" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-send-fill me-1"></i> Submit Claim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">

        </div>
    </div>
@endsection
