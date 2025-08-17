<?php

namespace App\Contracts;

interface AllRosterManageServiceContract
{
    public function allRosterDetails();
    public function storeHolidayRoster(array $validated);
    public function storeNightRoster(array $validated);
    public function storeExtraDutyRoster(array $validated);



}
