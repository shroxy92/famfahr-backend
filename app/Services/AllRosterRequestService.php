<?php

namespace App\Services;

use App\Contracts\AllRosterManageRepositoryContract;
use App\Contracts\AllRosterManageServiceContract;
use Illuminate\Support\Facades\Auth;

class AllRosterRequestService implements AllRosterManageServiceContract
{
    protected $allRosterRepository;
    public function __construct(AllRosterManageRepositoryContract $allRosterRepository)
    {
        $this->allRosterRepository = $allRosterRepository;
    }

    public function allRosterDetails()
    {
        //return $this->allRosterService->allRosterDetails();
    }

    public function storeHolidayRoster(array $validated)
    {

        $validated['employee_id'] = Auth::user()->emp_id;
        return $this->allRosterRepository->storeHolidayRoster($validated);
    }

    public function storeNightRoster(array $validated)
    {
        $validated['employee_id'] = Auth::user()->emp_id;
        //dd($validated);
        return $this->allRosterRepository->storeNightRoster($validated);
    }

    public function storeExtraDutyRoster(array $validated)
    {
        // TODO: Implement storeExtraDutyRoster() method.
        $validated['employee_id'] = Auth::user()->emp_id;
        return $this->allRosterRepository->storeExtraDutyRoster($validated);
    }
}
