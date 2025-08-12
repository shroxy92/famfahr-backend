@php
    $isRosterOpen = Request::is('roster/extraduty') || Request::is('roster/latenight') || Request::is('roster/holiday') || Request::is('roster/report') || Request::is('request_details');
    $isRosterApplyOpen = Request::is('roster/extraduty') || Request::is('roster/latenight') || Request::is('roster/holiday');
    $isRosterReportOpen = Request::is('roster/report') || Request::is('request_details');
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
                <a class="nav-link {{ Request::is('roster/extraduty') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('roster.extraduty') }}">Extra Duty</a>
                <a class="nav-link {{ Request::is('roster/latenight') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('roster.latenight') }}">Late Night Duty</a>
                <a class="nav-link {{ Request::is('roster/holiday') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('roster.holiday') }}">Holiday Duty</a>
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
                <a class="nav-link {{ Request::is('roster/report') || Request::is('request_details') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('roster.report') }}">All Roster Request</a>
            </nav>
        </div>

    </nav>
</div>
