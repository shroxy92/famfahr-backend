<?php

namespace App\Http\Controllers;

use App\Contracts\AllRosterManageRepositoryContract;
use App\Contracts\AllRosterManageServiceContract;
use App\Http\Requests\StoreExtraDutyRequest;
use App\Http\Requests\StoreHolidayDutyRequest;
use App\Http\Requests\StoreLateNightDutyRequest;
use App\Models\ExtraDuty;
use App\Models\HolidayDuty;
use App\Models\LateNightDuty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RosterController extends Controller
{
    protected $allRosterService;
    public function __construct(AllRosterManageServiceContract $allRosterService)
    {
        $this->allRosterService = $allRosterService;
    }


    public function roster_holiday()
    {
        return view('layouts.roster.roster_holiday');
    }

    public function roster_latenight()
    {
        return view('layouts.roster.roster_latenight');
    }
    public function roster_extraduty()
    {
        return view('layouts.roster.roster_extraduty');
    }

    public function roster_holiday_store(StoreHolidayDutyRequest $request)
    {
        $validated = $request->validated();

        $isStore = $this->allRosterService->storeHolidayRoster($validated);

        return redirect()->back()->with('success', 'Holiday duty request submitted!');

    }
    public function roster_latenight_store(StoreLateNightDutyRequest $requestlnd)
    {
        $validated = $requestlnd->validated();

        $isStore = $this->allRosterService->storeNightRoster($validated);

        return redirect()->back()->with('success', 'Holiday duty request submitted!');

    }
    public function roster_extraduty_store(StoreExtraDutyRequest $requested)
    {
        ///$validated['approved_by_lead'] = $requested->has('approved_by_lead') ? 1 : 0;
        $validated = $requested->validated();
        //dd($validated);
        $isStore = $this->allRosterService->storeExtraDutyRoster($validated);

        return redirect()->back()->with('success', 'Holiday duty request submitted!');

    }
    public function processedReport()
    {
        $userId = Auth::user()->emp_id;

        $extraDuties = ExtraDuty::where('employee_id', $userId)
            ->selectRaw("
                id,
                'extra' as type,
                extra_date as date,
                CONCAT(start_time, ' - ', end_time) as time_range,
                task_description as details,
                IF(approved_by_lead = 1, 'approved', 'rejected') as status,
                updated_at as processed_at
            ")->get();

        $holidayDuties = HolidayDuty::where('employee_id', $userId)
            ->selectRaw("
                id,
                'holiday' as type,
                duty_date as date,
                NULL as time_range,
                reason as details,
                IF(is_approved = 1, 'approved', 'rejected') as status,
                updated_at as processed_at
            ")->get();

        $lateNightDuties = LateNightDuty::where('employee_id', $userId)
            ->selectRaw("
                id,
                'latenight' as type,
                duty_date as date,
                CONCAT(from_time, ' - ', to_time) as time_range,
                reason as details,
                IF(1, 'approved', 'rejected') as status,
                updated_at as processed_at
                ")->get();
        $processedRequests = collect()
            ->merge($extraDuties)
            ->merge($holidayDuties)
            ->merge($lateNightDuties)
            ->sortByDesc('processed_at')
            ->values();

        return view('layouts.roster.all_roster_requests', compact('processedRequests'));
    }

    public function store()
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update($id)
    {

    }
    public function destroy($id)
    {

    }



}
