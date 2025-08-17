<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;
use App\Services\AttendanceService;
use App\Services\EmployeeService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    protected $attendanceService;
    public function __construct(ATTendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }
    public function index()
    {
        $userId = auth()->user()->emp_id; // or selected user
        $today = now()->toDateString();

        $attendance = Attendance::where('employee_id', $userId)
            ->where('date', $today)
            ->first();
        return view('layouts.attendance.mannual_attendance_entry',compact('attendance'));
    }
    public function attendance_store(StoreAttendanceRequest $request)
    {
        $data = $request->validated();
        $this->attendanceService->attendance_store($data);
        return redirect()->route('attendance.entry');
    }
    public function attendance_report()
    {
        $attendanceData = Attendance::all()->where('employee_id',Auth::user()->emp_id);
        return view('layouts.attendance.report_attendance',compact('attendanceData'));
    }
    public function generateAttendanceReport()
    {
        $employeeId = Auth::user()->emp_id;
        $startDate = Carbon::create(2025, 8, 1);
        $endDate = Carbon::create(2025, 8, 31);
        $period = CarbonPeriod::create($startDate, $endDate);

        // Fetch all attendance for this employee in the month
        $attendances = Attendance::where('employee_id', $employeeId)
            ->whereBetween('date', [$startDate, $endDate])
            ->get()
            ->keyBy('date'); // So you can access like $attendances['2025-08-05']

        $report = [];

        foreach ($period as $date) {
            $formattedDate = $date->toDateString();

            // Skip weekends if needed
            if (in_array($date->dayOfWeek, [Carbon::SATURDAY])) {
                continue;
            }

            $record = $attendances[$formattedDate] ?? null;

            if ($record) {
                $report[] = [
                    'date' => $formattedDate,
                    'entry_time' => $record->entry_time,
                    'exit_time' => $record->exit_time,
                    'reason' => $record->reason,
                ];
            } else {
                // Absent record
                $report[] = [
                    'date' => $formattedDate,
                    'entry_time' => null,
                    'exit_time' => null,
                    'reason' => null, // No leave
                ];
            }
        }

        return $report;
    }
}
