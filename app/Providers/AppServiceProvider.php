<?php

namespace App\Providers;

use App\Contracts\EmployeeRepositoryContract;
use App\Contracts\EmployeeServiceContract;
use App\Repositories\EmployeeRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
