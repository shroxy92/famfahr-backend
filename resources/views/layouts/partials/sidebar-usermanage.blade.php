@php
    $isUserManageOpen = Request::is('employee/form') ||
                        Request::is('user/add') ||
                        Request::is('user_manage') ||
                        Request::is('add_dept_lead') ||
                        Request::is('employee/list') ||
                        Request::is('employee/list/*') ||
                        Request::is('user_permission');
@endphp

    <!-- User Management -->
<a class="nav-link {{ $isUserManageOpen ? '' : 'collapsed' }}" style="color: #2f4f4f !important;" href="#" data-bs-toggle="collapse"
   data-bs-target="#collapseUserManage" aria-expanded="{{ $isUserManageOpen ? 'true' : 'false' }}" aria-controls="collapseUserManage">
    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
    User Management
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse {{ $isUserManageOpen ? 'show' : '' }}" id="collapseUserManage" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">

        <a class="nav-link {{ Request::is('employee/form') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('hr.employee.viewForm') }}">
            Add Employee
        </a>

        <a class="nav-link {{ Request::is('user/add') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('hr.user.index') }}">
            Add User
        </a>

        <a class="nav-link {{ Request::is('user_manage') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('user_manage') }}">
            User Manage
        </a>

        <a class="nav-link {{ Request::is('add_dept_lead') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('add_dept_lead') }}">
            Add Department Lead
        </a>

        <a class="nav-link {{ Request::is('employee/list') || Request::is('employee/list/*')  ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ route('hr.employee.list') }}">
            Employee List
        </a>
        @can('user_permission')
            <a class="nav-link {{ Request::is('user_permission') ? 'active text-info fw-bold' : '' }}" style="color: #2f4f4f !important;" href="{{ url('user_permission') }}">
                Manage Permission
            </a>
        @endcan
    </nav>
</div>
