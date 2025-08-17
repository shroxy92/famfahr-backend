<?php

namespace App\Repositories;

use App\Contracts\AttendanceManageRepositoryContract;
use App\Http\Requests\StoreAttendanceRequest;
use App\Models\Attendance;

class AttendanceRepository implements AttendanceManageRepositoryContract
{
    protected $attendanceModel;
    public function __construct(Attendance $attendance)
    {
        $this->attendanceModel = $attendance;
    }

    public function attendance_store(array $data)
    {
        // TODO: Implement attendance_store() method.
        return $this->attendanceModel->create($data);
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
