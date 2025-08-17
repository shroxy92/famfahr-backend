@php
    // Helper Booleans
    $isAttendanceOpen = Request::is('attendance/entry') || Request::is('attendance/report');
    $isLeaveOpen = Request::is('new_leave') || Request::is('cancel_leave') || Request::is('adjust_leave') ||
                   Request::is('availed_*') || Request::is('leave_report');
    $isApplyOpen = Request::is('new_leave') || Request::is('cancel_leave') || Request::is('adjust_leave');
    $isAvailedOpen = Request::is('availed_adjustment') || Request::is('availed_cancel');
    $isReportOpen = Request::is('leave_report');
    $isUserProfileOpen = Request::is('profile') || Request::is('change_password');
@endphp

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion" style="background-color: #e6f2ef;" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('dashboard') ? 'active text-info fw-bold' : '' }}" href="{{ url('dashboard') }}" style="color: #2f4f4f !important;">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <hr>

                <!-- User Management -->
{{--                @auth--}}
{{--                    @if (auth()->user()->role === 'hr')--}}
{{--                        @include('layouts.partials.sidebar-usermanage')--}}
{{--                    @endif--}}
{{--                @endauth--}}
                <div class="sb-sidenav-menu-heading">HR</div>
                @include('layouts.partials.sidebar-usermanage')
                <div class="sb-sidenav-menu-heading">Interface</div>

                <!-- Attendance -->
                <a class="nav-link {{ $isAttendanceOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsat" aria-expanded="{{ $isAttendanceOpen ? 'true' : 'false' }}" aria-controls="collapseLayoutsat">
                    <div class="sb-nav-link-icon" style="color: #2f4f4f !important;"><i class="fas fa-columns"></i></div>
                    Attendance
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ $isAttendanceOpen ? 'show' : '' }}" id="collapseLayoutsat" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('attendance/entry') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('attendance.entry') }}">Manual Attendance</a>
                        <a class="nav-link {{ Request::is('attendance/report') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('attendance.report') }}">Attendance Report</a>
                    </nav>
                </div>

                <!-- Leave -->
                <a class="nav-link {{ $isLeaveOpen ? '' : 'collapsed' }}"  style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapsePages" aria-expanded="{{ $isLeaveOpen ? 'true' : 'false' }}" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Leave
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ $isLeaveOpen ? 'show' : '' }}" id="collapsePages" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        <!-- Apply -->
                        <a class="nav-link {{ $isApplyOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseAuth" aria-expanded="{{ $isApplyOpen ? 'true' : 'false' }}" aria-controls="pagesCollapseAuth">
                            Apply
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ $isApplyOpen ? 'show' : '' }}" id="pagesCollapseAuth" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('new_leave') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('new_leave') }}">New Leave</a>
                                <a class="nav-link {{ Request::is('cancel_leave') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('cancel_leave') }}">Cancel Leave</a>
                                <a class="nav-link {{ Request::is('adjust_leave') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('adjust_leave') }}">Adjust Leave (Not Approved Yet)</a>
                            </nav>
                        </div>

                        <!-- Availed -->
                        <a class="nav-link {{ $isAvailedOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseError" aria-expanded="{{ $isAvailedOpen ? 'true' : 'false' }}" aria-controls="pagesCollapseError">
                            Availed
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ $isAvailedOpen ? 'show' : '' }}" id="pagesCollapseError" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('availed_adjustment') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('availed_adjustment') }}">Adjustment of approved leave</a>
                                <a class="nav-link {{ Request::is('availed_cancel') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('availed_cancel') }}">Cancel of approved leave</a>
                            </nav>
                        </div>

                        <!-- Report -->
                        <a class="nav-link {{ $isReportOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
                           data-bs-target="#pagesCollapseErrorr" aria-expanded="{{ $isReportOpen ? 'true' : 'false' }}" aria-controls="pagesCollapseErrorr">
                            Report
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ $isReportOpen ? 'show' : '' }}" id="pagesCollapseErrorr" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('leave_report') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('leave_report') }}">Details Customized Report</a>
                            </nav>
                        </div>

                    </nav>
                </div>

                <!-- Claim Section -->
                @include('layouts.partials.sidebar-claim')

                <!-- Roster Section -->
                @include('layouts.partials.sidebar-roster')

                <!-- User Profile -->
                <a class="nav-link {{ $isUserProfileOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapseLayoutsup" aria-expanded="{{ $isUserProfileOpen ? 'true' : 'false' }}" aria-controls="collapseLayoutsup">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                    User Profile
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ $isUserProfileOpen ? 'show' : '' }}" id="collapseLayoutsup" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('profile') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('profile') }}">View Profile</a>
                        <a class="nav-link {{ Request::is('change_password') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('change_password') }}">Change Password</a>
                    </nav>
                </div>

                <!-- Approval -->
{{--                @auth--}}
{{--                    @if (auth()->user()->role === 'hr-admin' || auth()->user()->role === 'manager' || auth()->user()->role === 'management')--}}
{{--                        @include('layouts.partials.sidebar-approval')--}}
{{--                    @endif--}}
{{--                @endauth--}}
                @include('layouts.partials.sidebar-approval')
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name ?? 'Guest' }}
        </div>
    </nav>
</div>
