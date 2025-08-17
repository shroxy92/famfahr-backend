<?php

namespace App\Contracts;

interface AllRosterManageRepositoryContract
{
    public function allRosterDetails();
    public function storeHolidayRoster(array $data);
    public function storeNightRoster(array $data);
    public function storeExtraDutyRoster(array $data);
}
