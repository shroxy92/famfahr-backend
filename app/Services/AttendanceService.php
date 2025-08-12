<?php

namespace App\Services;

use App\Contracts\AttendanceManageRepositoryContract;
use App\Contracts\AttendanceManageServiceContract;
use App\Http\Requests\StoreAttendanceRequest;
use Illuminate\Support\Facades\Auth;

class AttendanceService implements AttendanceManageServiceContract
{

    private $attendanceRepository;
    public function __construct(AttendanceManageRepositoryContract $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
    }
    public function attendance_store(array $data)
    {
        // TODO: Implement attendance_store() method.
        $data['employee_id'] = Auth::user()->emp_id;
        return $this->attendanceRepository->attendance_store($data);
    }

    public function attendance_update($id, StoreAttendanceRequest $request)
    {
        // TODO: Implement attendance_update() method.
    }

    public function attendance_delete($id)
    {
        // TODO: Implement attendance_delete() method.
    }

    public function attendance_show($id)
    {
        // TODO: Implement attendance_show() method.
    }

    public function attendance_show_all(array $data)
    {
        // TODO: Implement attendance_show_all() method.
    }
}
