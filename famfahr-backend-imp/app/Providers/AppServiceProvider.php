<?php

namespace App\Providers;

use App\Contracts\DepartmentLeadServiceContract;
use App\Contracts\EmployeeRepositoryContract;
use App\Contracts\EmployeeServiceContract;
use App\Models\Department;
use App\Repositories\DepartmentLeadRepository;
use App\Repositories\EmployeeRepository;
use App\Services\DepartmentLeadService;
use App\Services\EmployeeService;
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
        $this->app->bind(DepartmentLeadRepository::class, DepartmentLeadRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
