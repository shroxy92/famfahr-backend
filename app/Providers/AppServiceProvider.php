<?php

namespace App\Providers;

use App\Contracts\AllClaimRequestRepositoryContract;
use App\Contracts\AllClaimRequestServiceContract;
use App\Contracts\AllRosterManageRepositoryContract;
use App\Contracts\AllRosterManageServiceContract;
use App\Contracts\AttendanceManageRepositoryContract;
use App\Contracts\AttendanceManageServiceContract;
use App\Contracts\DepartmentLeadRepositoryContract;
use App\Contracts\DepartmentLeadServiceContract;
use App\Contracts\EmployeeRepositoryContract;
use App\Contracts\EmployeeServiceContract;
use App\Contracts\UserRepositoryContract;
use App\Contracts\UserServiceContract;
use App\Models\Department;
use App\Repositories\AllClaimRequestRepository;
use App\Repositories\AllRosterRequestRepository;
use App\Repositories\AttendanceRepository;
use App\Repositories\DepartmentLeadRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;
use App\Services\AllClaimRequestService;
use App\Services\AllRosterRequestService;
use App\Services\AttendanceService;
use App\Services\DepartmentLeadService;
use App\Services\EmployeeService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeServiceContract::class, EmployeeService::class);
        $this->app->bind(EmployeeRepositoryContract::class, EmployeeRepository::class);
        $this->app->bind(DepartmentLeadServiceContract::class, DepartmentLeadService::class);
        $this->app->bind(DepartmentLeadRepositoryContract::class, DepartmentLeadRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(UserServiceContract::class, UserService::class);
        $this->app->bind(AllClaimRequestRepositoryContract::class, AllClaimRequestRepository::class);
        $this->app->bind(AllClaimRequestServiceContract::class, AllClaimRequestService::class);
        $this->app->bind(AllRosterManageRepositoryContract::class,AllRosterRequestRepository::class);
        $this->app->bind(AllRosterManageServiceContract::class,AllRosterRequestService::class);
        $this->app->bind(AttendanceManageRepositoryContract::class,AttendanceRepository::class);
        $this->app->bind(AttendanceManageServiceContract::class,AttendanceService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
