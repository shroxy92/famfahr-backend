@php
    $isApprovalOpen = Request::is('all_leave_req') || Request::is('approved_leave_list') || Request::is('all_claim_req') || Request::is('claim_history_ind')
    || Request::is('approved_claim') || Request::is('claim_reports') || Request::is('leave_reports') || Request::is('all_roster_requests')
    || Request::is('approved_roster') || Request::is('reports_roster') || Request::is('reports_ind_roster')||Request::is('attendance_manual_entry_request')
    || Request::is('approved_attendance')||Request::is('att_custom_report');

    $isLeaveApprovalOpen = Request::is('all_leave_req')||Request::is('approved_leave_list')||Request::is('leave_reports');
    $isAttendanceApprovalOpen = Request::is('attendance_manual_entry_request') || Request::is('approved_attendance')||Request::is('att_custom_report');
    $isClaimApprovalOpen = Request::is('all_claim_req')||Request::is('approved_claim')||Request::is('claim_reports')||Request::is('claim_history_ind');
    $isRosterApprovalOpen = Request::is('all_roster_requests') || Request::is('approved_roster') || Request::is('reports_roster') || Request::is('reports_ind_roster');
@endphp

<div class="sb-sidenav-menu-heading">Approval</div>

<a class="nav-link {{ $isApprovalOpen ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
   data-bs-target="#collapseApproval" aria-expanded="{{ $isApprovalOpen ? 'true' : 'false' }}" aria-controls="collapseApproval"
   style="color: #2f4f4f !important;">
    <div class="sb-nav-link-icon"><i class="fas fa-check-double"></i></div>
    All Approval
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse {{ $isApprovalOpen ? 'show' : '' }}" id="collapseApproval" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionApproval">

        {{-- Leave --}}
        <a class="nav-link {{ $isLeaveApprovalOpen ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
           data-bs-target="#approvalCollapseLeave" aria-expanded="{{ $isLeaveApprovalOpen ? 'true' : 'false' }}" aria-controls="approvalCollapseLeave"
           style="color: #2f4f4f !important;">
            Leave
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isLeaveApprovalOpen ? 'show' : '' }}" id="approvalCollapseLeave" data-bs-parent="#sidenavAccordionApproval">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('all_leave_req') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('all_leave_req') }}">All Request</a>
                <a class="nav-link {{ Request::is('approved_leave_list') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('approved_leave_list') }}">Approval List</a>
                <a class="nav-link {{ Request::is('leave_reports') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('leave_reports') }}">Custom Report</a>
            </nav>
        </div>

        {{-- Attendance --}}
        <a class="nav-link {{ $isAttendanceApprovalOpen ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
           data-bs-target="#approvalCollapseAttendance" aria-expanded="{{ $isAttendanceApprovalOpen ? 'true' : 'false' }}" aria-controls="approvalCollapseAttendance"
           style="color: #2f4f4f !important;">
            Attendance
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isAttendanceApprovalOpen ? 'show' : '' }}" id="approvalCollapseAttendance" data-bs-parent="#sidenavAccordionApproval">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('attendance_manual_entry_request') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('attendance_manual_entry_request') }}">Manual Request</a>
                <a class="nav-link {{ Request::is('approved_attendance') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('approved_attendance') }}">List of Approved Requests</a>
                <a class="nav-link {{ Request::is('att_custom_report') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('att_custom_report') }}">Custom Report</a>
            </nav>
        </div>

        {{-- Claim --}}
        <a class="nav-link {{ $isClaimApprovalOpen ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
           data-bs-target="#approvalCollapseClaim" aria-expanded="{{ $isClaimApprovalOpen ? 'true' : 'false' }}" aria-controls="approvalCollapseClaim"
           style="color: #2f4f4f !important;">
            Claim
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isClaimApprovalOpen ? 'show' : '' }}" id="approvalCollapseClaim" data-bs-parent="#sidenavAccordionApproval">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('all_claim_req') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('all_claim_req') }}">All Claim Request</a>
                <a class="nav-link {{ Request::is('approved_claim') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('approved_claim') }}">List of Approved Requests</a>
                <a class="nav-link {{ Request::is('claim_reports') || Request::is('claim_history_ind') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('claim_reports') }}">Custom Report</a>
            </nav>
        </div>

        {{-- Roster --}}
        <a class="nav-link {{ $isRosterApprovalOpen ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
           data-bs-target="#approvalCollapseRoster" aria-expanded="{{ $isRosterApprovalOpen ? 'true' : 'false' }}" aria-controls="approvalCollapseRoster"
           style="color: #2f4f4f !important;">
            Roster
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isRosterApprovalOpen ? 'show' : '' }}" id="approvalCollapseRoster" data-bs-parent="#sidenavAccordionApproval">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('all_roster_requests') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('all_roster_requests') }}">All Roster Request</a>
                <a class="nav-link {{ Request::is('approved_roster') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('approved_roster ') }}">List of Approved Requests</a>
                <a class="nav-link {{ Request::is('reports_roster') || Request::is('reports_ind_roster') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('reports_roster') }}">Custom Report</a>
            </nav>
        </div>

    </nav>
</div>
