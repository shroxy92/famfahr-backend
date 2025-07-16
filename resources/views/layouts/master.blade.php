<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>@yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f3f6;
        }
        .profile-container {
            max-width: 900px;
            margin: 40px auto;
        }
        .profile-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.07);
            padding: 30px;
        }
        .profile-avatar {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 25px;
        }
        .section-title {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 5px;
        }
        .info-label {
            font-weight: 500;
            color: #555;
        }
        .info-value {
            color: #212529;
        }
        .permission-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .permission-section-title {
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.5rem;
        }
        .form-check {
            margin-bottom: 0.5rem;
        }
    </style>

</head>
<body class="sb-nav-fixed">

@include('layouts.partials.header')

<div id="layoutSidenav">
@include('layouts.partials.sidebar')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            @yield('content')
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Famfa HR Solution - 2025</div>
                <div>
                    <a href="#">Privacy Policy</a> &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.querySelector("#datatablesSimple");
        if (table) {
            new simpleDatatables.DataTable(table);
        }
    });
</script>

@stack('scripts')

</body>
</html>
