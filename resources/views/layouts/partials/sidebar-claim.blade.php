@php
    $isClaimOpen = Request::is('claim_request_form') || Request::is('advance_salary') || Request::is('loan_apply') || Request::is('all_claim_requested_list') || Request::is('requested_details');
    $isClaimApplyOpen = Request::is('claim_request_form') || Request::is('advance_salary') || Request::is('loan_apply');
    $isClaimReportOpen = Request::is('all_claim_requested_list') || Request::is('requested_details');
@endphp

<a class="nav-link {{ $isClaimOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
   data-bs-target="#collapseClaim" aria-expanded="{{ $isClaimOpen ? 'true' : 'false' }}" aria-controls="collapseClaim">
    <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
    Claim
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse {{ $isClaimOpen ? 'show' : '' }}" id="collapseClaim" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionClaim">

        <!-- Apply -->
        <a class="nav-link {{ $isClaimApplyOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
           data-bs-target="#claimCollapseApply" aria-expanded="{{ $isClaimApplyOpen ? 'true' : 'false' }}" aria-controls="claimCollapseApply">
            Apply
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isClaimApplyOpen ? 'show' : '' }}" id="claimCollapseApply" data-bs-parent="#sidenavAccordionClaim">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('claim_request_form') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('claim_request_form') }}">New Claim</a>
                <a class="nav-link {{ Request::is('advance_salary') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('advance_salary') }}">Advance Salary</a>
                <a class="nav-link {{ Request::is('loan_apply') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('loan_apply') }}">Loan</a>
            </nav>
        </div>

        <!-- Report -->
        <a class="nav-link {{ $isClaimReportOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
           data-bs-target="#claimCollapseReport" aria-expanded="{{ $isClaimReportOpen ? 'true' : 'false' }}" aria-controls="claimCollapseReport">
            Report
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse {{ $isClaimReportOpen ? 'show' : '' }}" id="claimCollapseReport" data-bs-parent="#sidenavAccordionClaim">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link {{ Request::is('all_claim_requested_list') || Request::is('requested_details') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('all_claim_requested_list') }}">All Claimed Request</a>
            </nav>
        </div>

    </nav>
</div>
