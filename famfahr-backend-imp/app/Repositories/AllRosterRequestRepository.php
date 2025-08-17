<?php

namespace App\Repositories;

use App\Contracts\AllRosterManageRepositoryContract;
use App\Models\ExtraDuty;
use App\Models\HolidayDuty;
use App\Models\LateNightDuty;

class AllRosterRequestRepository implements AllRosterManageRepositoryContract
{
    protected $holidayRoster , $nightRoster , $extraDutyRoster;

    public function __construct(HolidayDuty $holidayRoster, LateNightDuty $nightRoster, ExtraDuty $extraDutyRoster)
    {
        $this->holidayRoster = $holidayRoster;
        $this->nightRoster = $nightRoster;
        $this->extraDutyRoster = $extraDutyRoster;
    }
    public function allRosterDetails()
    {
        // TODO: Implement allRosterDetails() method.
    }

    public function storeHolidayRoster(array $data)
    {
        // TODO: Implement storeHolidayRoster() method.
        return $this->holidayRoster->create($data);
    }

    public function storeNightRoster(array $data)
    {
        // TODO: Implement storeNightRoster() method.
        return $this->nightRoster->create($data);
    }

    public function storeExtraDutyRoster(array $data)
    {
        // TODO: Implement storeExtraDutyRoster() method.
        return $this->extraDutyRoster->create($data);
    }

    public function storeLateNightRoster(array $validated)
    {
        // TODO: Implement storeLateNightRoster() method.
    }
}
