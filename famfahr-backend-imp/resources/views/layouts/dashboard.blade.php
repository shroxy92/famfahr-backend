@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <p class="text-muted">Welcome to your dashboard!</p>

    {{-- Slim & Modern Stat Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm" style="background-color: #f1fdf6;">
                <div class="card-body py-3 px-4 text-success">
                    <small class="text-muted">Availed Leaves</small>
                    <h5 class="mb-0 mt-1 fw-semibold">52 Days</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm" style="background-color: #fff9ed;">
                <div class="card-body py-3 px-4 text-warning">
                    <small class="text-muted">Total Delays</small>
                    <h5 class="mb-0 mt-1 fw-semibold">8 Times</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm" style="background-color: #f0faff;">
                <div class="card-body py-3 px-4 text-primary">
                    <small class="text-muted">Success Cards</small>
                    <h5 class="mb-0 mt-1 fw-semibold">12</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm" style="background-color: #fff0f0;">
                <div class="card-body py-3 px-4 text-danger">
                    <small class="text-muted">Issues Reported</small>
                    <h5 class="mb-0 mt-1 fw-semibold">3</h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Bar Chart --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white border-bottom-0">
            <strong class="text-muted"><i class="fas fa-chart-bar me-2 text-success"></i> Monthly Leave Overview</strong>
        </div>
        <div class="card-body">
            <canvas id="leaveChart" height="90"></canvas>
        </div>
    </div>

    {{-- Optional DataTable --}}
    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-sm table-hover">
                <thead class="table-light">
                <tr>
                    <th>Name</th><th>Position</th><th>Office</th><th>Age</th><th>Start Date</th><th>Salary</th>
                </tr>
                </thead>
                <tbody>
                <tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>61</td><td>2011/04/25</td><td>$320,800</td></tr>
                <tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>63</td><td>2011/07/25</td><td>$170,750</td></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('leaveChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Leaves Availed',
                    data: [4, 2, 6, 3, 5, 7, 2],
                    backgroundColor: 'rgba(40, 167, 69, 0.4)',
                    borderColor: '#28a745',
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 18
                }]
            },
            options: {
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#f1fdf6',
                        titleColor: '#28a745',
                        bodyColor: '#333',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1, color: '#aaa' },
                        grid: { color: '#eee' }
                    },
                    x: {
                        ticks: { color: '#888' },
                        grid: { display: false }
                    }
                }
            }
        });
    </script>
@endpush
