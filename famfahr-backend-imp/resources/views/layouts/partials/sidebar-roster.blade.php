@php
    $isRosterOpen = Request::is('extra_duty') || Request::is('late_night_duty') || Request::is('holiday_duty') || Request::is('all_roster_request') || Request::is('request_details');
    $isRosterApplyOpen = Request::is('extra_duty') || Request::is('late_night_duty') || Request::is('holiday_duty');
    $isRosterReportOpen = Request::is('all_roster_request') || Request::is('request_details');
@endphp

<a class="nav-link {{ $isRosterOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
   data-bs-target="#collapseRoster" aria-expanded="{{ $isRosterOpen ? 'true' : 'false' }}" aria-controls="collapseRoster">
    <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
    Roster
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse {{ $isRosterOpen ? 'show' : '' }}" id="collapseRoster" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionRoster">

        <!-- Apply -->
        <a class="nav-link {{ $isRosterApplyOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
           data-bs-target="#rosterCollapseApply" aria-expanded="{{ $isRosterApplyOpen ? 'true' : 'false' }}" aria-controls="rosterCollapseApply">
            Apply
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isRosterApplyOpen ? 'show' : '' }}" id="rosterCollapseApply" data-bs-parent="#sidenavAccordionRoster">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('extra_duty') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('extra_duty') }}">Extra Duty</a>
                <a class="nav-link {{ Request::is('late_night_duty') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('late_night_duty') }}">Late Night Duty</a>
                <a class="nav-link {{ Request::is('holiday_duty') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('holiday_duty') }}">Holiday Duty</a>
            </nav>
        </div>

        <!-- Report -->
        <a class="nav-link {{ $isRosterReportOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
           data-bs-target="#rosterCollapseReport" aria-expanded="{{ $isRosterReportOpen ? 'true' : 'false' }}" aria-controls="rosterCollapseReport">
            Report
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isRosterReportOpen ? 'show' : '' }}" id="rosterCollapseReport" data-bs-parent="#sidenavAccordionRoster">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('all_roster_request') || Request::is('request_details') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('all_roster_request') }}">All Roster Request</a>
            </nav>
        </div>

    </nav>
</div>
